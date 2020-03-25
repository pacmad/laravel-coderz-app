<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Topic;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function search(Request $request){
    $time = $request -> input('time');
      $solved = $request -> input('solved');

      $now = Carbon::now();

      if($request -> missing('user')){
        switch ($time){
          case 'lastday':
            $date = $now -> subday();
            return response() -> json($this -> query($solved, $time, $date));
            break;
          case 'lastweek':
          $date = $now -> subweek();
            return response() -> json($this -> query($solved, $time, $date));
            break;
          case 'lastmonth':
            $date = $now -> subMonth();
            return response() -> json($this -> query($solved, $time, $date));
            break;
            case 'always':
              $date = Carbon::minValue();
              return response() -> json($this -> query($solved, $time, $date));
              break;
        }
      }else{
        $user = $request -> input('user');
        switch ($time){
        case 'lastday':
          $date = $now -> subday();
          return response() -> json($this -> query($solved, $time, $date, $user));
          break;
        case 'lastweek':
        $date = $now -> subweek();
          return response() -> json($this -> query($solved, $time, $date, $user));
          break;
        case 'lastmonth':
          $date = $now -> subMonth();
          return response() -> json($this -> query($solved, $time, $date, $user));
          break;
          case 'always':
            $date = Carbon::minValue();
            return response() -> json($this -> query($solved, $time, $date, $user));
            break;
      }
      }

    }





    public function query($solved, $time, $date, $user = 0){

      $tickets = DB::table('ticket_user')
      ->select('ticket_user.user_id', 'ticket_user.ticket_id', 'tickets.solved', 'tickets.created_at', 'tickets.topic_id')
      -> join('tickets', 'tickets.id', '=', 'ticket_user.ticket_id')
      -> where('ticket_user.user_id', $user);

       $graphBars = DB::table('topics')
      ->when($user !== 0, function ($query) use ($tickets, $solved, $date) {
         return $query -> joinSub($tickets, 'user_tickets', function ($join){
           $join -> on('topics.id', '=', 'user_tickets.topic_id');
         })
         -> when($solved !== 'none', function($query) use ($solved, $date) {
                 return $query -> where([
                                     ['user_tickets.solved', $solved],
                                     ['user_tickets.created_at', '>' , $date]
                                   ]);
                 },
                 function($query) use ($date){
                   return $query -> where('user_tickets.created_at', '>' , $date);
                 });
       },
       function($query) use ($solved, $date){
         return $query -> join('tickets', 'topics.id', '=', 'tickets.topic_id')
         -> when($solved !== 'none', function($query) use ($solved, $date) {
                 return $query -> where([
                                     ['tickets.solved', $solved],
                                     ['tickets.created_at', '>' , $date]
                                   ]);
                 },
                 function($query) use ($date){
                   return $query -> where('tickets.created_at', '>' , $date);
                 });
       })
       -> select('topics.name', DB::raw('count(*) as num'))
      -> groupBy('topics.id') -> get();

      $results = [];
      foreach ($graphBars as $bar ) {
        $results['topics'][] = $bar -> name;
        $results['numbers'][] = $bar -> num;
      }
      return $results;
    }
}

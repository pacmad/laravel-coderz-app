<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = $request -> query('query');
        $now = Carbon::now();

        //salvo lo stato della dashboard per l'utente corrente nel db
        if($user -> dash_status !== $query){
          $user -> dash_status = $query;
          $user -> save();
        }

      switch ($query){
        case 'lastday':
          $date = $now -> subday();
          $tickets = Ticket::whereDate('created_at', $date) -> get();
          break;
        case 'lastweek':
          $date = $now -> subweek();
          $tickets = Ticket::whereDate('created_at', '>', $date) -> get();
          break;
        case 'lastmonth':
          $date = $now -> subMonth();
          $tickets = Ticket::whereDate('created_at', '>' , $date) -> get();
          break;
        case 'always':
          $tickets = Ticket::all();
          break;
      }

        return view('home', compact('tickets'));
    }
}

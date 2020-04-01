<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\User;

class TicketController extends Controller
{
  public function index(){
    $tickets = Ticket::all();

    return response() -> json($tickets);
  }

  public function show($id){
    $ticket = Ticket::findOrFail($id);

    return response() -> json($ticket);
  }

  public function showUserTickets($id){
    $results = [];
    $user = User::findOrFail($id);
    $tickets = $user -> tickets;
    foreach ($tickets as $ticket) {
      $topic = $ticket -> topic;
    }

    return response() -> json($tickets);
  }

  public function store(Request $request){


  }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
  public function index(Request $request){

    $query = $request -> query('query');
    $tickets = Ticket::all();

    return view('allTickets', compact('tickets'));
  }


}

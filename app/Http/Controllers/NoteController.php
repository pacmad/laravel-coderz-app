<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class NoteController extends Controller
{
  public function index($id){
    $ticket = Ticket::findOrFail($id);

    return response() -> json($ticket -> notes);
  }

  public function store(Request $request){
    
  }
}

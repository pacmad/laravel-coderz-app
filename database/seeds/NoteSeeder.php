<?php

use Illuminate\Database\Seeder;

use App\Note;
use App\Ticket;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Note::class, 20) -> make() -> each(function($note){
        $ticket = Ticket::inRandomOrder() -> first();
        $note -> ticket() -> associate($ticket) -> save();
      });
    }
}

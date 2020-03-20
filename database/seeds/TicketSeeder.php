<?php

use Illuminate\Database\Seeder;

use App\Ticket;
use App\User;
use App\Topic;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Ticket::class, 15) -> make() -> each(function($ticket){
        $topic = Topic::inRandomOrder() -> first();
        $ticket -> topic() -> associate($topic) -> save();
      });

      Ticket::all() -> each(function($ticket){
        $users = User::inRandomOrder() -> take(rand(1, 3)) -> get();
        $ticket -> users() -> attach($users);
      });
    }
}

<?php

use Illuminate\Database\Seeder;

use App\Ticket;
use App\User;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Ticket::class, 15) -> create() -> each(function($ticket){
        $users = User::inRandomOrder() -> take(rand(1, 4)) -> get();
        $ticket -> users() -> attach($users);
      });
    }
}

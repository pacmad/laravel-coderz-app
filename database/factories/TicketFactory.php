<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'title' => $faker -> sentence($nbWords = 3, $variableNbWords = true),
        'body' => $faker -> text($maxNbChars = 200),
        'solved' => false
    ];
});

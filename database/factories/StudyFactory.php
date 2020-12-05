<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Study;
use Faker\Generator as Faker;

$factory->define(Study::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber,
        'start' => now(),
        'finish' => now(),
        'totaltime' => $faker->randomNumber,
        'today' => $faker->date,
        'status' => "勉強中",
        'subject' => $faker->word,
        'time_start' => $faker->randomNumber.'年'.$faker->randomNumber.'月'.$faker->randomNumber.'日',
        'time_finish' => $faker->randomNumber.'年'.$faker->randomNumber.'月'.$faker->randomNumber.'日',
        'memo' => $faker->paragraph,
        'book_id' => $faker->randomNumber
    ];
});

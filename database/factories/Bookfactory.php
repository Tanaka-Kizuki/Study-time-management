<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomFloat,
        'image' => "https://cover.openbd.jp/".$faker->numberBetween(12,13).".jpg",
        'title'=> $faker->word
    ];
});

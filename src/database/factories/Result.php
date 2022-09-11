<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Result;
use Faker\Generator as Faker;

$factory->define(Result::class, function (Faker $faker) {
    return [
        //
        'exam-diagnosis' => $faker->sentence(1),
        'description' => $faker->paragraph,
        'image' => $faker->imageUrl(360,360,'animals', true, 'cats'),
        'user_id' => $faker->numberBetween(31,33),
        'order_id' => $faker->numberBetween(1,20),
    ];
});
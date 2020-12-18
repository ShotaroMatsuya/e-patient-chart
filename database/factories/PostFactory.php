<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->numberBetween(1, 10),
        'name' => $faker->name,
        'birthday' => $faker->dateTimeBetween('-80 years', '-20years')->format('Y-m-d'),
        'sex' => $faker->randomElement($array = [0, 1]),
        'clinical_diagnosis' => $faker->sentence(1),
        'description' => $faker->paragraph,


    ];
});

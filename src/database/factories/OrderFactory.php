<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam;
use App\Post;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        //
        'post_id' => factory(Post::class),
        'comment' => $faker->sentence(),
        'executed_at' => $faker->dateTimeBetween('-1month', '+1month')->format('Y-m-d H:i:s'),
        'exam_id' => $faker->randomElement($array = [1, 2, 3]),
        'isFinished' => $faker->randomElement($array = [0, 1])
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NewsComment;
use Faker\Generator as Faker;

$factory->define(NewsComment::class, function (Faker $faker) {

    return [
        'news_id' => $faker->randomDigitNotNull,
        'customer_id' => $faker->randomDigitNotNull,
        'content' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

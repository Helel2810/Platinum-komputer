<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Courier;
use Faker\Generator as Faker;

$factory->define(Courier::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'phone' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

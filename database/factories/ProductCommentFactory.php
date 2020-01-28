<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductComment;
use Faker\Generator as Faker;

$factory->define(ProductComment::class, function (Faker $faker) {

    return [
        'stars' => $faker->randomDigitNotNull,
        'content' => $faker->word,
        'product_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

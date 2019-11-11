<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {

    return [
        'image' => $faker->word,
        'content' => $faker->word,
        'source' => $faker->word,
        'period' => $faker->word,
        'news_category_id' => $faker->randomDigitNotNull,
        'admin_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DeliveryOrder;
use Faker\Generator as Faker;

$factory->define(DeliveryOrder::class, function (Faker $faker) {

    return [
        'send_date' => $faker->word,
        'receive_date' => $faker->word,
        'status' => $faker->word,
        'order_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

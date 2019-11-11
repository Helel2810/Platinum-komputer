<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShippingCost;
use Faker\Generator as Faker;

$factory->define(ShippingCost::class, function (Faker $faker) {

    return [
        'price' => $faker->randomDigitNotNull,
        'shipping_method_id' => $faker->randomDigitNotNull,
        'courier_id' => $faker->randomDigitNotNull,
        'district_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

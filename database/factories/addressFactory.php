<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {

    return [
        'address' => $faker->text,
        'recipient_name' => $faker->word,
        'phone' => $faker->word,
        'customer_id' => $faker->randomDigitNotNull,
        'district_id' => $faker->randomDigitNotNull,
        'post_code' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

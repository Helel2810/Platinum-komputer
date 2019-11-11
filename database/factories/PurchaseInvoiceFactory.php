<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PurchaseInvoice;
use Faker\Generator as Faker;

$factory->define(PurchaseInvoice::class, function (Faker $faker) {

    return [
        'status' => $faker->word,
        'note' => $faker->word,
        'supplier_id' => $faker->randomDigitNotNull,
        'product_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

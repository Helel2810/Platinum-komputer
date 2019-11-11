<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AdminRole;
use Faker\Generator as Faker;

$factory->define(AdminRole::class, function (Faker $faker) {

    return [
        'admin_role' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

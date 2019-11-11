<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'price' => $faker->randomDigitNotNull,
        'stock' => $faker->randomDigitNotNull,
        'sku' => $faker->word,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'weight' => $faker->randomDigitNotNull,
        'image1' => $faker->randomElement(["https://www.placecage.com/400/400", "https://www.placecage.com/c/400/400"]),
        'image2' => $faker->randomElement(["https://www.placecage.com/400/400", "https://www.placecage.com/c/400/400"]),
        'category_id' => $faker->randomElement(Category::all()->pluck('id')),
        'brand_id' => $faker->randomElement(Brand::all()->pluck('id')),
        'admin_id' => 1,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

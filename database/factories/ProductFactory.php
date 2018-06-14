<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'details' => $faker->paragraph,
        'price' => $faker->numberBetween(5, 9000),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(2, 30)
    ];
});

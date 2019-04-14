<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'product' 	  => $faker->word,
        'description' => $faker->sentence,
        'image'		  => 'test_image_'.$faker->numberBetween(1, 5).'.jpg',
        'quantity'    => $faker->numberBetween(0, 20),
        'price' 	  => $faker->randomFloat(2, 500, 9999),
        'category_id' => $faker->numberBetween(1, 3),
        'created_at'  => $faker->dateTime
    ];
});

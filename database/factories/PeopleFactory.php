<?php

use Faker\Generator as Faker;

$factory->define(App\People::class, function (Faker $faker) {
    return [
    	'pin' => $faker->numberBetween(7000000, 999999999),
    	'first_name' => $faker->firstName,
    	'last_name' => $faker->lastName,
    	'email' => $faker->safeEmail,
    	'phone' => $faker->e164PhoneNumber,
    	'address' => $faker->address,
    	'city_id' => $faker->numberBetween(1, 20),
    	'state_id' => $faker->numberBetween(1, 12),
    	'created_at' => $faker->dateTime
    ];
});

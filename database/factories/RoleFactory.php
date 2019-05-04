<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
    	'role' 		  => 'admin',
    	'description' => 'Administrador'
    ];
});

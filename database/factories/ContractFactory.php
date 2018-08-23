<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Contract::class, function (Faker $faker) {
    return [
        'number'            =>$faker->unique()->numberBetween($min = 1, $max = 50),
        'description'       =>$faker->text($maxNbChars = 50),
    ];
});

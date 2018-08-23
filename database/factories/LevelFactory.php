<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Level::class, function (Faker $faker) {
    return [
        'code'            => $faker->unique()->numberBetween($min = 1, $max = 50),
        'description'       => $faker->unique()->word,
    ];
});

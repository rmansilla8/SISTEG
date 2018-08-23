<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Classification::class, function (Faker $faker) {
    return [
        'description'   =>$faker->unique()->word,
    ];
});

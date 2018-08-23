<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Working_day::class, function (Faker $faker) {
    return [
        'description'   =>$faker->unique()->word,
    ];
});

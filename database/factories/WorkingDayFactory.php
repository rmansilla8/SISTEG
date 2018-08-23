<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Working_day::class, function (Faker $faker) {
    return [
        'description'   =>$faker->unique()->word,
    ];
});

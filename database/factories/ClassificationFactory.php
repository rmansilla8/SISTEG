<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Classification::class, function (Faker $faker) {
    return [
        'description'   =>$faker->unique()->word,
    ];
});

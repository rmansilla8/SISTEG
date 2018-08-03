<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Turn::class, function (Faker $faker) {
    return [
        'description'   =>$faker->unique()->word,
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Plan::class, function (Faker $faker) {
    return [
        'name'  => $faker->unique()->word,
    ];
});

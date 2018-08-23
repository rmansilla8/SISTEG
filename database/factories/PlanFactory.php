<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Plan::class, function (Faker $faker) {
    return [
        'name'  => $faker->unique()->word,
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Position::class, function (Faker $faker) {
    return [
        'description'  => $faker->unique()->word,
    ];
});
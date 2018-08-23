<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Position::class, function (Faker $faker) {
    return [
        'description'  => $faker->unique()->word,
    ];
});

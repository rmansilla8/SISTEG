<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Turn::class, function (Faker $faker) {
    return [
        'description'   =>$faker->unique()->word,
    ];
});

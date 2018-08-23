<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Gender::class, function (Faker $faker) {
    return [
        'description'  =>$faker->unique()->word,
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Ethnic_community::class, function (Faker $faker) {
    return [
        'name'  =>$faker->unique()->word,
    ];
});

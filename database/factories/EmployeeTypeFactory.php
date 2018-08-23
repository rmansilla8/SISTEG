<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Employee_type::class, function (Faker $faker) {
    return [
        'description'   =>$faker->unique()->word,
    ];
});

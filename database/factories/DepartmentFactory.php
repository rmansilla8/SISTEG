<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Department::class, function (Faker $faker) {
    return [
        'code'  =>$faker->unique()->numberBetween($min = 1, $max = 400),
        'name'  =>$faker->unique()->state,
    ];
});

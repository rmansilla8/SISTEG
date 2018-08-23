<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Municipality::class, function (Faker $faker) {
    return [
        'code'              =>$faker->numberBetween($min = 1, $max = 400),
        'name'              =>$faker->unique()->word,
        'department_id'     =>rand(1,6),
    ];
});

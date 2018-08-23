<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\School_district::class, function (Faker $faker) {
    return [
        'code'                  =>$faker->numberBetween($min = 1, $max = 40),
        'municipality_id'       =>rand(1,6),
    ];
});

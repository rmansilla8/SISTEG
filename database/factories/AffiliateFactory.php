<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Affiliate::class, function (Faker $faker) {
    return [
        'number'                => $faker->numberBetween($min = 1000, $max = 9999),
        'employee_id'             => rand(1, 6),
        'affiliate_state_id'    =>rand(1, 6),   
    ];
});

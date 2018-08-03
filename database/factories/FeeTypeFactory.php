<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Fee_type::class, function (Faker $faker) {
    return [
        'description'  =>$faker->unique()->word,
    ];
});

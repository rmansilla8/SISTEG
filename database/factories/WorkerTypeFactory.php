<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Worker_type::class, function (Faker $faker) {
    return [
        'description'   =>$faker->unique()->word,
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Language_domain::class, function (Faker $faker) {
    return [
        'description'  =>$faker->unique()->word,
    ];
});

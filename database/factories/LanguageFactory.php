<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Language::class, function (Faker $faker) {
    return [
        'name'  =>$faker->unique()->word,
    ];
});

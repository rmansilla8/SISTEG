<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Area::class, function (Faker $faker) {
    return [
        'name'  =>$faker->unique()->word,
    ];
});

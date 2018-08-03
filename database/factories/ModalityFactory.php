<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Modality::class, function (Faker $faker) {
    return [
        'description'   =>$faker->unique()->word,
    ];
});

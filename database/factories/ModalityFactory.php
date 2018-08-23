<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Modality::class, function (Faker $faker) {
    return [
        'description'   =>$faker->unique()->word,
    ];
});

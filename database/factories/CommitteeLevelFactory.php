<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Committee_level::class, function (Faker $faker) {
    return [
        'name'              =>$faker->unique()->word,
        'description'       =>$faker->text($maxNbChars = 150),
    ];
});

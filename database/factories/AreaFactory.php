<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Area::class, function (Faker $faker) {
    return [
        'name'  =>$faker->unique()->word,
    ];
});

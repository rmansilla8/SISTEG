<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Civil_state::class, function (Faker $faker) {
    $title = $faker->unique()->word;
    return [
        'description'   =>$title,
    ];
});

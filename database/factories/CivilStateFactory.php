<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\civil_status::class, function (Faker $faker) {
    $title = $faker->unique()->word;
    return [
        'description'   =>$title,
    ];
});

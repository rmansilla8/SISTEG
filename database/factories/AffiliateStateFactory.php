<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Affiliate_state::class, function (Faker $faker) {
    return [
        'description'  =>$faker->unique()->word,
    ];
});

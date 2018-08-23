<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Employee::class, function (Faker $faker) {
    return [
        'nit'                       =>$faker->unique()->word,
        'scale_register'            =>$faker->unique()->word,
        'person_id'                 =>rand(1, 6),
        'ethnic_community_id'       =>rand(1, 6),
        'employee_type_id'          =>rand(1, 6),
    ];
});

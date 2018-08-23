<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Supervision::class, function (Faker $faker) {
    return [
        'employee_type_id'            =>rand(1, 6),
        'person_id'                 =>rand(1, 6),
        'school_district_id'           =>rand(1, 6),  
    ];
});

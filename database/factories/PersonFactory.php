<?php

use Faker\Generator as Faker;

$factory->define(Sisteg\Person::class, function (Faker $faker) {
    return [
        'dpi'                       =>$faker->unique()->word,
        'first_name'                =>$faker->firstName,
        'second_name'               =>$faker->firstName,
        'third_name'                =>$faker->word,
        'first_surname'             =>$faker->lastname,
        'second_surname'            =>$faker->lastname,
        'email'                     =>$faker->unique()->email,
        'phone'                     =>$faker->randomDigit,
        'address'                   =>$faker->address,
        'municipality_id'           =>rand(1, 6),  
        'gender_id'                 =>rand(1, 6),
        'birthdate'                 =>$faker->date($format = 'Y-m-d', $max='now'),
        'civil_state_id'           =>rand(1, 6),
    ];
});

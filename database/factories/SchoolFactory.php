<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\School::class, function (Faker $faker) {
    return [
        'code'                      =>$faker->numberBetween($min = 1, $max = 400),
        'name'                      =>$faker->company,
        'level_id'                  =>rand(1,6),
        'school_district_id'        =>rand(1,6),
        'area_id'                   =>rand(1,6),
        'classification_id'         =>rand(1,6),
        'modality_id'               =>rand(1,6),
        'working_day_id'            =>rand(1,6),
        'address'                   =>$faker->address,
    ];
});

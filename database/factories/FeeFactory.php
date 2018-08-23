<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisteg\Fee::class, function (Faker $faker) {
    return [
        'affiliate_id'          =>rand(1, 6),
        'fee_type_id'           =>rand(1, 6),  
        'amount'                =>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 44),
        'date'                  =>$faker->date($format = 'Y-m-d', $max = 'now'),
        'year'                  =>$faker->year,
        'detail'                =>$faker->text,
    ];
});

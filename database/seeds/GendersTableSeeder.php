<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            [
                'description'  =>  'Femenino',
               
            ],
            [
                'description'  =>  'Masculino',
                
            ],
            [
                'description'  =>  'Lesbiana',
               
            ],
            [
                'description'  =>  'Gay',
                
            ],
            [
                'description'  =>  'Bisexual',
               
            ],
            [
                'description'  =>  'Transexual',
                
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
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

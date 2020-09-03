<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            [
                'code'  =>  '42',
                'name'  =>  'Preprimaria',
            ],
            [
                'code'  =>  '43',
                'name'  =>  'Primaria'
            ],
            [
                'code'  =>  '44',
                'name'  =>  'Básico'
            ],
            [
                'code'  =>  '45',
                'name'  =>  'Diversificado'
            ],
            [
                'code'  =>  '46',
                'name'  =>  'Primaria Adultos'
            ]
        ]);
    }
}

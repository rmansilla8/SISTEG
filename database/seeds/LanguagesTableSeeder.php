<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'name'  =>  "K'iche'"
            ],
            [
                'name'  =>  'Kaqchikel'
            ],
            [
                'name'  =>  'Tz''utujil'
            ],
            [
                'name'  =>  'Achi'
            ],
            [
                'name'  =>  'Sakapulteko'
            ],
            [
                'name'  =>  'Ixil'
            ],
            [
                'name'  =>  'Uspanteko'
            ],
            [
                'name'  =>  'Mam'
            ],
            [
                'name'  =>  'Chuj'
            ],
            [
                'name'  =>  'Popti''(Jakalteco)'
            ],
            [
                'name'  =>  'Q''anjob''al'
            ],
            [
                'name'  =>  'Awakateko'
            ],
            [
                'name'  =>  'Q''eqchi'''
            ],
            [
                'name'  =>  'Poqomchi'''
            ],
            [
                'name'  =>  'Poqomam'
            ],
            [
                'name'  =>  'Itzaj'''
            ],
            [
                'name'  =>  'Ch''orti'''
            ],
            [
                'name'  =>  'Akateko'
            ],
            [
                'name'  =>  'Xinka'
            ],
            [
                'name'  =>  'Mopan'
            ],
            [
                'name'  =>  'Garifuna'
            ],
            [
                'name'  =>  'Sipakapense'
            ],
            [
                'name'  =>  'Tektiteko'
            ],
            [
                'name'  =>  'Ladino/no indigena'
            ],
            [
                'name'  =>  'Chalchiteko'   
            ]
            
                        
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turns')->insert([
            [
                'name'  =>  'Matutina'
            ],
            [
                'name'  =>  'Vespertina'
            ],
            [
                'name'  => 'Nocturna'
            ]
        ]);
    }
}

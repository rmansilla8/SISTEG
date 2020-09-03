<?php

use Illuminate\Database\Seeder;

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

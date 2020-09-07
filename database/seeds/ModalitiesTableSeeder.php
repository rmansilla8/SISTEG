<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalities')->insert([
            [
                'name'  =>  'Monolingüe'
            ],
            [
                'name'  =>  'Bilingüe'
            ]
        ]);
    }
}

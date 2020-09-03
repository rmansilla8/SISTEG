<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cycles')->insert([
            [
                'name'  =>  'Anual'
            ],
            [
                'name'  =>  'Semestral'
            ]
        ]);
    }
}

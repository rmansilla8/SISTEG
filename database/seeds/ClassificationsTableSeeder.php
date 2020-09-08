<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classifications')->insert([
            [
                'description'   =>  'Mixta'
            ],
            [
                'description'   =>  'Normal'
            ]
        ]);
    }
    
}

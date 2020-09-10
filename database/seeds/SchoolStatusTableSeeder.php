<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_status')->insert([
            [
                'name'  =>  'Activa'
            ],
            [
                'name'  =>  'Inactiva'
            ]
        ]);
    }
}

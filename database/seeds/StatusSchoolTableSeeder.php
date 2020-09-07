<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_schools')->insert([
            [
                'name'  =>  'Activa'
            ],
            [
                'name'  =>  'Inactiva'
            ]
        ]);
    }
}

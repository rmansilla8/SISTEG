<?php

use Illuminate\Database\Seeder;

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

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_status')->insert([
            [
                'description'   =>  'Activo'
            ],
            [
                'description'   =>  'Inactivo'
            ],
        ]);
    }
}

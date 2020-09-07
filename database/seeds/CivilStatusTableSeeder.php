<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivilStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('civil_status')->insert([

            [
                'name'  =>  'Soltera'
            ],
            [
                'name'  =>  'Soltero'
            ],
            [
                'name'  =>  'Casada'
            ],
            [
                'name'  =>  'Casado'
            ],
            [
                'name'  =>  'Viuda'
            ],
            [
                'name'  =>  'Viudo'
            ],
        ]);
    }
}

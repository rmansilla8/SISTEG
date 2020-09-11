<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolDistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("school_districts")->insert([

            [
                'code'  =>  '14',
                'municipality_id'  =>  '18'
            ],
            [
                'code'  =>  '15',
                'municipality_id'  =>  '18'
            ],
            [
                'code'  =>  '16',
                'municipality_id'  =>  '18'
            ],
            [
                'code'  =>  '17',
                'municipality_id'  =>  '18'
            ],
            [
                'code'  =>  '18',
                'municipality_id'  =>  '18'
            ],
            [
                'code'  =>  '19',
                'municipality_id'  =>  '18'
            ],
        ]);
        
    }
}

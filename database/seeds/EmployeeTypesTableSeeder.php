<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_types')->insert([
            [
               "description"    =>  "Director" 
            ],
            [
                "description"   =>  "Docente"
            ],
            [
                "description"   =>  "Operativo"
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Sisteg\Employee_type;
class EmployeeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Employee_type::class, 6)->create();
    }
}

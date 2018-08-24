<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Employee;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Employee::class, 6)->create();
    }
}

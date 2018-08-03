<?php

use Illuminate\Database\Seeder;
use Sisteg\Employee;
class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisteg\Employee::class, 6)->create();
    }
}

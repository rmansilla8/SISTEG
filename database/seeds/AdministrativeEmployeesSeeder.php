<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Administrative_employee;

class AdministrativeEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Administrative_employee::class, 6)->create();
    }
}

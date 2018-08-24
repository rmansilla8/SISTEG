<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Department;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Department::class, 6)->create();
    }
}

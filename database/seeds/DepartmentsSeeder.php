<?php

use Illuminate\Database\Seeder;
use Sisteg\Department;
class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisteg\Department::class, 6)->create();
    }
}

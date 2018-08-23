<?php

use Illuminate\Database\Seeder;
use Sisteg\Administrative_employee;
class Administrative_employeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Administrative_employee::class, 6)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Working_day;

class WorkingDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Working_day::class, 6)->create();
    }
}

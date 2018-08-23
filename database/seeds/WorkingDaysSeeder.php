<?php

use Illuminate\Database\Seeder;
use Sisteg\Working_day;
class WorkingDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Working_day::class, 6)->create();
    }
}

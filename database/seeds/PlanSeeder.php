<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Plan::class, 6)->create();
    }
}

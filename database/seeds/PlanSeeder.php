<?php

use Illuminate\Database\Seeder;
use Sisteg\Plan;
class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Plan::class, 6)->create();
    }
}

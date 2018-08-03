<?php

use Illuminate\Database\Seeder;
use Sisteg\Fee;
class FeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Fee::class, 6)->create();
    }
}

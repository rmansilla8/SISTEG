<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Fee;

class FeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Fee::class, 6)->create();
    }
}

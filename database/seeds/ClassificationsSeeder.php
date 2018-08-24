<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Classification;

class ClassificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Classification::class, 6)->create();
    }
}

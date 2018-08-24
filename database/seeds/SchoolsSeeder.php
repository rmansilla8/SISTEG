<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\School;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\School::class, 6)->create();
    }
}

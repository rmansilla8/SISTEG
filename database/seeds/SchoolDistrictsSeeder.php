<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\School_district;

class SchoolDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\School_district::class, 6)->create();
    }
}

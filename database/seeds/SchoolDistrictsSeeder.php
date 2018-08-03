<?php

use Illuminate\Database\Seeder;
use Sisteg\School_district;
class SchoolDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\School_district::class, 6)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use Sisteg\School;
class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\School::class, 6)->create();
    }
}

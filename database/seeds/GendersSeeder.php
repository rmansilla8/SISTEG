<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Gender;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Gender::class, 6)->create();
    }
}

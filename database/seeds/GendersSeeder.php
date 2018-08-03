<?php

use Illuminate\Database\Seeder;
use Sisteg\Gender;
class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Gender::class, 6)->create();
    }
}

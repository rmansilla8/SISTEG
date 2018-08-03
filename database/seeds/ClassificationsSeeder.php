<?php

use Illuminate\Database\Seeder;
use Sisteg\Classification;
class ClassificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisteg\Classification::class, 6)->create();
    }
}

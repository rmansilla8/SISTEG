<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Level;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Level::class, 6)->create();
    }
}

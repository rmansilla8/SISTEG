<?php

use Illuminate\Database\Seeder;
use Sisteg\Level;
class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Level::class, 6)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use Sisteg\Turn;
class TurnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Turn::class, 6)->create();
    }
}

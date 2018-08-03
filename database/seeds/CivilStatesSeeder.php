<?php

use Illuminate\Database\Seeder;
use Sisteg\Civil_state;
class CivilStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Civil_state::class, 6)->create();
    }
}

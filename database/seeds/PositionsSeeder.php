<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Position;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Position::class, 6)->create();
    }
}

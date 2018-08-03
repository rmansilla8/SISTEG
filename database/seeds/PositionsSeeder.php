<?php

use Illuminate\Database\Seeder;
use Sisteg\Position;
class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Position::class, 6)->create();
    }
}

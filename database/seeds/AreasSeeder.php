<?php

use Illuminate\Database\Seeder;
use Sisteg\Area;
class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Area::class, 6)->create();
    }
}

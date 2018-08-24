<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Area;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Area::class, 6)->create();
    }
}

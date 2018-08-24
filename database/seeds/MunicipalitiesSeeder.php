<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Municipality;

class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Municipality::class, 6)->create();
    }
}

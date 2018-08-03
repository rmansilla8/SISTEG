<?php

use Illuminate\Database\Seeder;
use Sisteg\Municipality;
class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisteg\Municipality::class, 6)->create();
    }
}

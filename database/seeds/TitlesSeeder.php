<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Title;

class TitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Title::class, 6)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use Sisteg\Title;
class TitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Title::class, 6)->create();
    }
}

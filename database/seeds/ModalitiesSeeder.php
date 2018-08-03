<?php

use Illuminate\Database\Seeder;
use Sisteg\Modality;
class ModalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Modality::class, 6)->create();
    }
}

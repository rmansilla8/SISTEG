<?php

use Illuminate\Database\Seeder;
use Sisteg\Worker_type;
class WorkerTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Worker_type::class, 6)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use Sisteg\Supervision;
class SupervisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Supervision::class, 6)->create();
    }
}

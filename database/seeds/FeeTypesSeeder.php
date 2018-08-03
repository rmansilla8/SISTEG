<?php

use Illuminate\Database\Seeder;
use Sisteg\Fee_type;
class FeeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Fee_type::class, 6)->create();
    }
}

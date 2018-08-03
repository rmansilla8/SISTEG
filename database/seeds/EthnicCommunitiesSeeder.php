<?php

use Illuminate\Database\Seeder;
use Sisteg\Ethnic_community;
class EthnicCommunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Ethnic_community::class, 6)->create();
    }
}

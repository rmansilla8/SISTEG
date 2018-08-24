<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Ethnic_community;

class EthnicCommunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Ethnic_community::class, 6)->create();
    }
}

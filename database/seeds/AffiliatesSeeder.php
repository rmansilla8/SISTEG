<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Affiliate;

class AffiliatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Affiliate::class, 6)->create();
    }
}

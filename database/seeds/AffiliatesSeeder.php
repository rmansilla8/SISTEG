<?php

use Illuminate\Database\Seeder;
use Sisteg\Affiliate;
class AffiliatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Affiliate::class, 6)->create();
    }
}

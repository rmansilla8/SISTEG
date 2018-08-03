<?php

use Illuminate\Database\Seeder;
use Sisteg\Affiliate_state;
class AffiliateStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Affiliate_state::class, 6)->create();
    }
}

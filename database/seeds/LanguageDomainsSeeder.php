<?php

use Illuminate\Database\Seeder;
use Sisteg\Language_domain;
class LanguageDomainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Language_domain::class, 6)->create();
    }
}

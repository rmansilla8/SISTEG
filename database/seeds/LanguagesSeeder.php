<?php

use Illuminate\Database\Seeder;
use Sisteg\Language;
class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Language::class, 6)->create();
    }
}

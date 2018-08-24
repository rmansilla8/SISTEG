<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Language;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Language::class, 6)->create();
    }
}

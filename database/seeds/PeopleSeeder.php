<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Person;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Person::class, 6)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use Sisteg\Person;
class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisteg\Person::class, 6)->create();
    }
}

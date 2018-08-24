<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\User::class, 6)->create();
    }
}

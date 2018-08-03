<?php

use Illuminate\Database\Seeder;
use Sisteg\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\User::class, 6)->create();
    }
}

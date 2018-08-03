<?php

use Illuminate\Database\Seeder;
use Sisteg\Contract;
class ContractsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (Sisteg\Contract::class, 6)->create();
    }
}

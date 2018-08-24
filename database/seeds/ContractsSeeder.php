<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Contract;

class ContractsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Contract::class, 6)->create();
    }
}

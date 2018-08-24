<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\Committee_level;

class CommitteeLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisteg\Committee_level::class, 6)->create();
    }
}

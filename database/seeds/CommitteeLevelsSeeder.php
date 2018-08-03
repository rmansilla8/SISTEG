<?php

use Illuminate\Database\Seeder;
use Sisteg\Committee_level;
class CommitteeLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisteg\Committee_level::class, 6)->create();
    }
}

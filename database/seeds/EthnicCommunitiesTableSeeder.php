<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EthnicCommunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ethnic_communities')->insert([
            [
                'name'  =>  'Maya'
            ],
            [
                'name'  =>  'Ladino/Mestizo'
            ],
            [
                'name'  =>  'Garifuna'
            ],
            [
                'name'  =>  'Xinka'
            ]
        ]);
    }
}

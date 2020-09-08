<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contracts')->insert([
            [
                'number'    =>  '021',
                'description'    =>  'Contrato Temporal'
            ],
            [
                'number'    =>  '022',
                'description'    =>  'Contrato Temporal Operativos'
            ],
            [
                'number'    =>  '011',
                'description'    =>  'Contrato Permanente'
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'code' => '01',
                'name' => 'Guatemala'
            ],
            [
                'code' => '02',
                'name' => 'El Progreso'
            ],
            [
                'code' => '03',
                'name' => 'Sacatepéquez'
            ],
            [
                'code' => '04',
                'name' => 'Chimaltenango'
            ],
            [
                'code' => '05',
                'name' => 'Escuintla'
            ],
            [
                'code' => '06',
                'name' => 'Santa Rosa'
            ],
            [
                'code' => '07',
                'name' => 'Sololá'
            ],
            [
                'code' => '08',
                'name' => 'Totonicapán'
            ],
            [
                'code' => '09',
                'name' => 'Quetzaltenango'
            ],
            [
                'code' => '10',
                'name' => 'Suchitepéquez'
            ],
            [
                'code' => '11',
                'name' => 'Retalhuleu'
            ],
            [
                'code' => '12',
                'name' => 'San Marcos'
            ],
            [
                'code' => '13',
                'name' => 'Huehuetenango'
            ],
            [
                'code' => '14',
                'name' => 'Quiché'
            ],
            [
                'code' => '15',
                'name' => 'Baja Verapaz'
            ],
            [
                'code' => '16',
                'name' => 'Alta Verapaz'
            ],
            [
                'code' => '17',
                'name' => 'Petén'
            ],
            [
                'code' => '18',
                'name' => 'Izabal'
            ],
            [
                'code' => '19',
                'name' => 'Zacapa'
            ],
            [
                'code' => '20',
                'name' => 'Chiquimula'
            ],
            [
                'code' => '21',
                'name' => 'Jalapa'
            ],
            [
                'code' => '22',
                'name' => 'Jutiapa'
            ],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->insert([
            [
                'description'   =>  'Maestra de Educación Primaria Urbana'
            ],
            [
                'description'   =>  'Maestro de Educación Primaria Urbana'
            ],
            [
                'description'   =>  'Maestra de Educación Preprimaria'
            ],
            [
                'description'   =>  'Maestra de Educación Primaria Intercultural'
            ],
            [
                'description'   =>  'Maestro de Educación Primaria Intercultural'
            ],
            [
                'description'   =>  'Maestro de Educación Primaria Intercultural con Énfasis en Educación Bilingüe'
            ],
            [
                'description'   =>  'Licenciado en Educación Primaria Intercultural con Énfasis en Educación Bilingüe'
            ],
        ]);
    }
}

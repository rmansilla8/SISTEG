<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AreasTableSeeder::class,
            //CyclesTablesSeeder::class,
            DepartmentsTableSeeder::class,
            LevelsTableSeeder::class,
            ModalitiesTableSeeder::class,
            MunicipalitiesTableSeeder::class,
            PlansTableSeeder::class,
            //StatusSchoolTableSeeder::class,
            TurnsTableSeeder::class,

        ]);
    }
}

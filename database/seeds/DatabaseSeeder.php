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
            UsersSeeder::class,
            //PasswordResetsSeeder::class,
            CivilStatesSeeder::class,
            LanguagesSeeder::class,
            LanguageDomainsSeeder::class,
            TitlesSeeder::class,
            EthnicCommunitiesSeeder::class,
            DepartmentsSeeder::class,
            MunicipalitiesSeeder::class,
            ClassificationsSeeder::class,
            ModalitiesSeeder::class,
            AreasSeeder::class,
            LevelsSeeder::class,
            TurnsSeeder::class,
            AffiliateStatesSeeder::class,
            PositionsSeeder::class,
            CommitteeLevelsSeeder::class,
            WorkerTypesSeeder::class,
            ContractsSeeder::class,
            GendersSeeder::class,
            SchoolDistrictsSeeder::class,
            SchoolsSeeder::class,
            PeopleSeeder::class,
            EmployeesSeeder::class,
            AffiliatesSeeder::class,
            SupervisionsSeeder::class,
            FeeTypesSeeder::class,
            FeesSeeder::class,
            //
        ]);
    }
}

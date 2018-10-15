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
            PlanSeeder::class,
            //DepartmentsSeeder::class,
            //MunicipalitiesSeeder::class,
            ClassificationsSeeder::class,
            ModalitiesSeeder::class,
            AreasSeeder::class,
            LevelsSeeder::class,
            WorkingDaysSeeder::class,
            AffiliateStatesSeeder::class,
            PositionsSeeder::class,
            CommitteeLevelsSeeder::class,
            EmployeeTypesSeeder::class,
            ContractsSeeder::class,
            GendersSeeder::class,
            SchoolDistrictsSeeder::class,
            SchoolsSeeder::class,
            PeopleSeeder::class,
            EmployeesSeeder::class,
            AffiliatesSeeder::class,
            AdministrativeEmployeesSeeder::class,
            FeeTypesSeeder::class,
            FeesSeeder::class,
            //
        ]);
    }
}

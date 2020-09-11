<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisteg\School_district;

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
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            PermissionUserTableSeeder::class,
            RoleUserTableSeeder::class,
            PermissionUserTableSeeder::class,
            AreasTableSeeder::class,
            LanguagesTableSeeder::class,
            EthnicCommunitiesTableSeeder::class,
            CivilStatusTableSeeder::class,
            TitlesTableSeeder::class,
            ContractsTableSeeder::class,
            ClassificationsTableSeeder::class,
            SchoolStatusTableSeeder::class,
            WorkStatusTableSeeder::class,
            DepartmentsTableSeeder::class,
            GendersTableSeeder::class,
            LevelsTableSeeder::class,
            ModalitiesTableSeeder::class,
            MunicipalitiesTableSeeder::class,
            PlansTableSeeder::class,
            //StatusSchoolTableSeeder::class,
            TurnsTableSeeder::class,
            CyclesTableSeeder::class,
            School_districts::class,

        ]);
    }
}

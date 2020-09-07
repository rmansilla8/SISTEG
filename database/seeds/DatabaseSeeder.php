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
            //CyclesTablesSeeder::class,
            DepartmentsTableSeeder::class,
            GendersTableSeeder::class,
            LevelsTableSeeder::class,
            ModalitiesTableSeeder::class,
            MunicipalitiesTableSeeder::class,
            PlansTableSeeder::class,
            //StatusSchoolTableSeeder::class,
            TurnsTableSeeder::class,

        ]);
    }
}

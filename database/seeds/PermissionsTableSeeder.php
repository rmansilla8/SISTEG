<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name'  =>  'Todos',
                'slug'  =>  'todos',
                'description'   =>  'Acceso a todo'
            ],
            [
                'name'  =>  'Registrador',
                'slug'  =>  'registrador',
                'description'   =>  'Acceso a afiliación'
            ],
            [
                'name'  =>  'Finanzas',
                'slug'  =>  'finanzas',
                'description'   =>  'Acceso a Finanzas'
            ]
        ]);
    }
}

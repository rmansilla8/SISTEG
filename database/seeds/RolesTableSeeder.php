<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name'  =>  'Administrador',
                'slug'  =>  'admin',
                'description' =>    'Administrador del sistema',
            ],
            [
                'name'  =>  'Registrador',
                'slug'  =>  'registrador',
                'description'   =>  'Puede registrar afiliados'
            ],
            [
                'name'  =>  'Finanzas',
                'slug'  =>  'finanzas',
                'description'   =>  'Puede registrar cuotas voluntarias'
                
            ]
        ]);
    }
}

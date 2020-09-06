<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'  =>  'Roberto Mansilla',
                'email'  =>  'r.mansilla05@gmail.com',
                'password'  =>  '$2y$10$.8f30WZfggrNfgVAtyzm.eFkIFSoEe1MECaZx6zmKUny4191w0oam',
                'status'    =>  '1'
            ],
            [
                'name'  =>  'Lesvia Terraza',
                'email'  =>  'lesdiths@gmail.com',
                'password'  =>  '$2y$10$WPk8OOXLg3b4t0SH88a1JeLC/SskSWolDiGTapVKVu174rPZ123R.',
                'status'    =>  '1'
            ]
        ]);
    }
}

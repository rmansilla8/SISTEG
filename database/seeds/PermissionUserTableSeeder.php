<?php

use Illuminate\Database\Seeder;

class PermissionUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_user')->insert([
            [
                'permission_id'  =>  '1',
                'user_id'  =>  '1'
            ],
            [
                'permission_id'  =>  '1',
                'user_id'  =>  '2',
            ]
        ]);
    }
}

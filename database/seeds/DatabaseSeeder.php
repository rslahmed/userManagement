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
        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'activity_log' => 1,
            'activity_delete' => 1,
            'user_access' => 1,
            'user_add' => 1,
            'user_edit' => 1,
            'user_delete' => 1,
            'role_access' => 1,
            'role_add' => 1,
            'role_edit' => 1,
            'role_delete' => 1,
            'setting_access' => 1,

        ]);
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@admin',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'status' => 1,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@email.com',
                'phone' => '1234567890',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'user',
                'email' => 'user@email.com',
                'phone' => '1234567890',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        ]);
    }
}

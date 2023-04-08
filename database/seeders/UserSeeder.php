<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin1',
            'role' => 'admin',
            'email' => 'admin1@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234'),
            'remember_token' => 'abcd',
            
        ]);

        DB::table('users')->insert([
            'name' => 'admin2',
            'role' => 'admin',
            'email' => 'admin2@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('6789'),
            'remember_token' => 'abcd',
        ]);


    }
}

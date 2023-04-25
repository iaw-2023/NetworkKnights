<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            'name' => 'admin1',
            'role' => 'admin',
            'email' => 'admin1@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234'),
            'remember_token' => 'abcd',
            
        ]);

        DB::table('clients')->insert([
            'name' => 'admin2',
            'role' => 'admin',
            'email' => 'admin2@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('6789'),
            'remember_token' => 'abcd',
        ]);


    }
}

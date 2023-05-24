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
            'name' => 'Juan Perez',
            'role' => 'client',
            'email' => 'client1@client.com',
            'email_verified_at' => now(),
            // 'password' => bcrypt('1234'),
            // 'remember_token' => 'abcd',
            
        ]);

        DB::table('clients')->insert([
            'name' => 'Florencia Sanchez',
            'role' => 'client',
            'email' => 'client2@client.com',
            'email_verified_at' => now(),
            //'password' => bcrypt('6789'),
            // 'remember_token' => 'abcd',
        ]);

        DB::table('clients')->insert([
            'name' => 'Roberto Gomez',
            'role' => 'client',
            'email' => 'client3@client.com',
            'email_verified_at' => now(),
            //'password' => bcrypt('6789'),
            //'remember_token' => 'abcd',
        ]);


    }
}

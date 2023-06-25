<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            'name' => 'Juan',
            'surname' => 'Perez',
            'role' => 'client',
            'address' => 'Alem 690',
            'email' => 'juanperez@client.com',
            'password' => Hash::make('juanpe'),
            'email_verified_at' => now()            
        ]);

        DB::table('clients')->insert([
            'name' => 'Florencia',
            'surname' => 'Sanchez',
            'role' => 'client',
            'address' => 'Zelarrayan 360',
            'email' => 'florsanchez@client.com',
            'password' => Hash::make("florchi"),
            'email_verified_at' => now()
        ]);

        DB::table('clients')->insert([
            'name' => 'Roberto',
            'surname' => 'Gomez',
            'role' => 'client',
            'address' => 'Paraguay 120',
            'email' => 'robertog@client.com',
            'password' => Hash::make("robert"),
            'email_verified_at' => now()
        ]);


    }
}

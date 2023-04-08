<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pets')->insert([
            'id_category' => '1',
            'name' => 'Luna',
            'sex' => 'female',            
        ]);

        DB::table('pets')->insert([
            'id_category' => '2',
            'name' => 'Campanita',
            'sex' => 'female',
            
        ]);

        DB::table('pets')->insert([
            'id_category' => '1',
            'name' => 'Toto',
            'sex' => 'male',
            
        ]);

        DB::table('pets')->insert([
            'id_category' => '2',
            'name' => 'Doscientos',
            'sex' => 'male',
            
        ]);
    }
}

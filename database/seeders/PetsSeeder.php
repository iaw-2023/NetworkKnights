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
            'image' => 'imagen1'          
        ]);

        DB::table('pets')->insert([
            'id_category' => '2',
            'name' => 'Campanita',
            'sex' => 'female',
            'image' => 'imagen2'
            
        ]);

        DB::table('pets')->insert([
            'id_category' => '1',
            'name' => 'Toto',
            'sex' => 'male',
            'image' => 'imagen3'
            
        ]);

        DB::table('pets')->insert([
            'id_category' => '2',
            'name' => 'Doscientos',
            'sex' => 'male',
            'image' => 'imagen4'
            
        ]);

        DB::table('pets')->insert([
            'id_category' => '3',
            'name' => 'Orejas',
            'sex' => 'male',
            'image' => 'imagen5'
            
        ]);
    }
}

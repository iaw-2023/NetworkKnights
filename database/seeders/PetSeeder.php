<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pets')->insert([
            'id_category' => '1',
            'id_order' =>'1',
            'name' => 'Luna',
            'sex' => 'female',  
            'image' => 'https://m.media-amazon.com/images/S/aplus-media-library-service-media/11d080b7-aaa4-45cc-8bf7-100a03218264.__CR0,0,1711,1711_PT0_SX300_V1___.jpg'          
        ]);

        DB::table('pets')->insert([
            'id_category' => '2',
            'id_order' =>'2',
            'name' => 'Campanita',
            'sex' => 'female',
            'image' => 'https://pbs.twimg.com/profile_images/664169149002874880/z1fmxo00_400x400.jpg'
            
        ]);

        DB::table('pets')->insert([
            'id_category' => '1',
            'name' => 'Toto',
            'sex' => 'male',
            'image' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTbLw0raa1bR-XJBqRjEwBhnHIwWgLMYohHxMfZxSjfJ-H49-Cd'
            
        ]);

        DB::table('pets')->insert([
            'id_category' => '2',
            'id_order' =>'4',
            'name' => 'Doscientos',
            'sex' => 'male',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtkfMX-5beCWv5mog_zTZz4bXiMCxsoZIzig&usqp=CAU'
            
        ]);

        DB::table('pets')->insert([
            'id_category' => '3',
            'name' => 'Orejas',
            'sex' => 'male',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQksJAtxKd811LujcwjBl2wLOM8OTUKSDja_Ko_Bx44b_C2c9O4ZuOgisRUeB6qm0B49Mw&usqp=CAU'
            
        ]);
    }
}

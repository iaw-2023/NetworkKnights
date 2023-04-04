<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'id_category' => '1',
            'id_order' => '',
            'name' => 'Luna',
            'sex' => 'female',
            
        ]);

        DB::table('orders')->insert([
            'id_category' => '2',
            'id_order' => '',
            'name' => 'Campanita',
            'sex' => 'female',
            
        ]);

        DB::table('orders')->insert([
            'id_category' => '1',
            'id_order' => '',
            'name' => 'Toto',
            'sex' => 'male',
            
        ]);

        DB::table('orders')->insert([
            'id_category' => '2',
            'id_order' => '',
            'name' => 'Doscientos',
            'sex' => 'male',
            
        ]);
    }
}

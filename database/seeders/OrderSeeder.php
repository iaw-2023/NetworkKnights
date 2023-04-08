<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'id_user' => '1',
            'fecha' => now(),            
        ]);
        DB::table('orders')->insert([
            'id_user' => '1',
            'fecha' => now(),            
        ]);
        DB::table('orders')->insert([
            'id_user' => '1',
            'fecha' => now(),            
        ]);
        DB::table('orders')->insert([
            'id_user' => '2',
            'fecha' => now(),            
        ]);
        DB::table('orders')->insert([
            'id_user' => '1',
            'fecha' => now(),            
        ]);
    }
}

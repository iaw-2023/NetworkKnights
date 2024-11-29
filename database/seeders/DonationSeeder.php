<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('donations')->insert([
            'mount' => '800'
        ]);

        DB::table('donations')->insert([
            'mount' => '2900'
        ]);

        DB::table('donations')->insert([
            'mount' => '1000'
        ]);
    }
}

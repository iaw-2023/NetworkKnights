<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PetSeeder::class);
        $this->call(DonationSeeder::class);
    }
}

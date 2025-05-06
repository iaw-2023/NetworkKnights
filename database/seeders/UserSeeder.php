<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar y obtener IDs de roles
        $adminRoleId = DB::table('roles')->where('name', 'admin')->value('id');
        $colaboratorRoleId = DB::table('roles')->where('name', 'colaborator')->value('id');

        if (!$adminRoleId || !$colaboratorRoleId) {
            throw new \Exception('Roles "admin" o "colaborator" no existen. Asegúrate de correr el RolesSeeder primero.');
        }

        // Insertar usuarios
        $adminId = DB::table('users')->insertGetId([
            'name' => 'adminiaw',
            'email' => 'admin@iaw.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ]);

        $colaboratorId = DB::table('users')->insertGetId([
            'name' => 'iawquimey',
            'email' => 'quimeyrodi@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('campi123'),
        ]);

        // Relación en la tabla `model_has_roles`
        DB::table('model_has_roles')->insert([
            ['role_id' => $adminRoleId, 'model_type' => 'App\Models\User', 'model_id' => $adminId],
            ['role_id' => $colaboratorRoleId, 'model_type' => 'App\Models\User', 'model_id' => $colaboratorId],
        ]);
    }
}

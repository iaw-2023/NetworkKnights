<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crear permisos
        Permission::create(['name' => 'create pet']);
        Permission::create(['name' => 'edit pet']);
        Permission::create(['name' => 'delete pet']);

        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);

        Permission::create(['name' => 'delete order']);

        //Permission::create(['name' => 'approve order']);
        //Permission::create(['name' => 'reject order']);
        
        //crear roles
        $admin = Role::create(['name'=>'admin']);
        $colaborator = Role::create(['name'=>'colaborator']);
        //$client = Role ::create(['name'=>'client']);

        //asignar permisos a los roles
        $admin->givePermissionTo(Permission::all());
        $colaborator->givePermissionTo('create pet', 'edit pet', 'delete pet');

    }
}

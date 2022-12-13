<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Pmo']);
        Permission::create(['name' => 'admin/usuarios/index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin/usuarios/create'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin/empresas/index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin/empresas/edit'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin/convocatorias/index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin/convocatorias/edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin/convocatorias/create'])->syncRoles([$role1, $role2]);
    }
}

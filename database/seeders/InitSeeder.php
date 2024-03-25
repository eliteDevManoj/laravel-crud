<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        $superAdminRole = Role::create([
            'name' => 'super admin',
        ]);

        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        $userRole = Role::create([
            'name' => 'user',
        ]);

        //permissions for roles
        $createUser = Permission::create(['name' => 'create-user']);
        $editUser = Permission::create(['name' => 'edit-user']);
        $deleteUser = Permission::create(['name' => 'delete-user']);
        $viewUser = Permission::create(['name' => 'view-user']);

        $createPermission = Permission::create(['name' => 'create-permission']);
        $editPermission = Permission::create(['name' => 'edit-permission']);
        $deletePermission = Permission::create(['name' => 'delete-permission']);
        $viewPermission= Permission::create(['name' => 'view-permission']);

        //Super admin permissions
        $superAdminRole->givePermissionTo($createUser);
        $superAdminRole->givePermissionTo($editUser);
        $superAdminRole->givePermissionTo($deleteUser);
        $superAdminRole->givePermissionTo($viewUser);

        $superAdminRole->givePermissionTo($createPermission);
        $superAdminRole->givePermissionTo($editPermission);
        $superAdminRole->givePermissionTo($deletePermission);
        $superAdminRole->givePermissionTo($viewPermission);
        
        //Admin permissions
        $adminRole->givePermissionTo($createUser);
        $adminRole->givePermissionTo($editUser);
        $adminRole->givePermissionTo($viewUser);

        $adminRole->givePermissionTo($viewPermission);

        //create admin user
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@123#')
        ]);
        
        if($superAdmin){
            $superAdmin->assignRole('super admin');

            $superAdmin->givePermissionTo($createUser);
            $superAdmin->givePermissionTo($editUser);
            $superAdmin->givePermissionTo($deleteUser);
            $superAdmin->givePermissionTo($viewUser);

            $superAdmin->givePermissionTo($createPermission);
            $superAdmin->givePermissionTo($editPermission);
            $superAdmin->givePermissionTo($deletePermission);
            $superAdmin->givePermissionTo($viewPermission);
        }
    }
}

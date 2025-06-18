<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Employee Permission
        Permission::create(['name' => 'view_employees']);
        Permission::create(['name' => 'create_employees']);
        Permission::create(['name' => 'update_employees']);
        Permission::create(['name' => 'delete_employees']);
        // User Permission
        Permission::create(['name' => 'view_users']);
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'update_users']);
        Permission::create(['name' => 'delete_users']);
        // Role Permission
        Permission::create(['name' => 'view_roles']);
        Permission::create(['name' => 'create_roles']);
        Permission::create(['name' => 'update_roles']);
        Permission::create(['name' => 'delete_roles']);
        // Permission Permission
        Permission::create(['name' => 'view_permissions']);
        Permission::create(['name' => 'create_permissions']);
        Permission::create(['name' => 'update_permissions']);
        Permission::create(['name' => 'delete_permissions']);

        // Create Role
        $superAdminRole = Role::create(['name' => 'Super-Admin']);
        $superAdminRole->givePermissionTo(Permission::all());
        $superAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'kh_name' => 'អេតមីន',
            'phone_number' => '012354987',
            'user_level_id' => 1,
            'profile_img' => 'https://github.com/shadcn.png'
        ]);
        $superAdmin->assignRole($superAdminRole);

        $normalUserRole = Role::create(['name' => 'User']);
        $normalUserRole->givePermissionTo('view_employees');
        $normalUser = User::create([
            'name' => 'user',
            'email' => 'user@admin.com',
            'password' => Hash::make('password'),
            'kh_name' => 'អ្នកប្រើប្រាស់',
            'phone_number' => '012354987',
            'user_level_id' => 1,
            'profile_img' => 'https://github.com/shadcn.png'
        ]);
        $normalUser->assignRole($normalUserRole);
    }
}

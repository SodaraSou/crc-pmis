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
        $permissions = [
            [
                'name' => 'user_management',
                'kh_name' => 'គ្រប់គ្រងអ្នកប្រើប្រាស់',
            ],
            [
                'name' => 'user_level_management',
                'kh_name' => 'កំណត់លំដាប់អ្នកប្រើប្រាស់',
            ],
            [
                'name' => 'role_management',
                'kh_name' => 'កំណត់តួនាទី',
            ],
            [
                'name' => 'permission_management',
                'kh_name' => 'កំណត់មុខងារប្រព័ន្ធ',
            ],
            [
                'name' => 'department_management',
                'kh_name' => 'កំណត់នាយកដ្ឋាន',
            ],
            [
                'name' => 'province_management',
                'kh_name' => 'កំណត់រាជធានី/ខេត្ត',
            ],
            [
                'name' => 'branch_management',
                'kh_name' => 'កំណត់សាខា',
            ],
            [
                'name' => 'employee_management',
                'kh_name' => 'គ្រប់គ្រងបុគ្គលិក',
            ],
            [
                'name' => 'hq_report',
                'kh_name' => 'របាយការណ៍ថ្នាក់កណ្តាល',
            ],
            [
                'name' => 'branch_report',
                'kh_name' => 'របាយការណ៍ថ្នាក់សាខា',
            ],
            [
                'name' => 'sub_branch_report',
                'kh_name' => 'របាយការណ៍ថ្នាក់អនុសាខា',
            ],
            [
                'name' => 'group_report',
                'kh_name' => 'របាយការណ៍ថ្នាក់ក្រុមអនុសាខា',
            ],
            [
                'name' => 'setting_management',
                'kh_name' => 'កំណត់ប្រព័ន្ធ',
            ],
            [
                'name' => 'security_management',
                'kh_name' => 'កំណត់សុវត្ថិភាព',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $superAdminRole = Role::create([
            'name' => 'System Manager',
            'kh_name' => 'ប្រធានគ្រប់គ្រងប្រព័ន្ធ',
        ]);
        Role::create(['name' => 'Branch System Manager', 'kh_name' => 'ប្រធានគ្រប់គ្រងថ្នាក់សាខា']);
        Role::create(['name' => 'Sub-Branch System Manager', 'kh_name' => 'ប្រធានគ្រប់គ្រងថ្នាក់អនុសាខា']);
        Role::create(['name' => 'Branch System Operator', 'kh_name' => 'មន្ត្រីគ្រប់គ្រងថ្នាក់សាខា']);
        Role::create(['name' => 'Sub-Branch System Operator', 'kh_name' => 'មន្ត្រីគ្រប់គ្រងថ្នាក់អនុសាខា']);

        $superAdminRole->givePermissionTo(Permission::all());
        $superAdmin = User::create([
            'email' => 'admin@admin.com',
            'name' => 'admin',
            'password' => Hash::make('password'),
            'kh_name' => 'អេតមីន',
            'phone_number' => '012354987',
            'user_level_id' => 1,
            'branch_id' => 0,
            'profile_img' => 'https://github.com/shadcn.png',
            'department_id' => 6,
            'position' => "Admin",
            'department_position_order' => 100,
        ]);
        $superAdmin->assignRole($superAdminRole);
    }
}

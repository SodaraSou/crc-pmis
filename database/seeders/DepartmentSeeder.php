<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            [
                'en_name' => 'General Secretariat',
                'kh_name' => 'អគ្គលេខាធិការដ្ឋាន',
                'department_order' => 1,
            ],
            [
                'en_name' => 'Administration and Finance Department',
                'kh_name' => 'ន.រដ្ឋបាល~ហិរញ្ញកិច្ច',
                'department_order' => 2,
            ],
            [
                'en_name' => 'Crisis Management Department',
                'kh_name' => 'ន.គ្រប់គ្រងគ្រោះមហន្តរាយ',
                'department_order' => 3,
            ],
            [
                'en_name' => 'Health Department',
                'kh_name' => 'ន.សុខភាព',
                'department_order' => 4,
            ],
            [
                'en_name' => 'Communications Department',
                'kh_name' => 'ន.ទំនាក់ទំនង',
                'department_order' => 5,
            ],
            [
                'en_name' => 'Human Resource Department',
                'kh_name' => 'ន.ធនធានមនុស្ស',
                'department_order' => 6,
            ],
        ]);
    }
}

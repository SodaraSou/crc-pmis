<?php

namespace Database\Seeders;

use App\Models\EmployeeStatus;
use Illuminate\Database\Seeder;

class EmployeeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_statuses = [
            [
                'kh_name' => 'កំពុងធ្វើការ',
                'en_name' => 'Active',
            ],
            [
                'kh_name' => 'សម្រាក',
                'en_name' => 'On Leave',
            ],
            [
                'kh_name' => 'លាឈប់',
                'en_name' => 'Resigned',
            ],
            [
                'kh_name' => 'បញ្ឈប់ការងារ',
                'en_name' => 'Terminated',
            ],
            [
                'kh_name' => 'ចូលនិវត្តន៍',
                'en_name' => 'Retired',
            ],
        ];

        foreach ($employee_statuses as $employee_status) {
            EmployeeStatus::create($employee_status);
        }
    }
}

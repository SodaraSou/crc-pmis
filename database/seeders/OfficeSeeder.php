<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offices = [
            [
                'kh_name' => 'ការិយាល័យរដ្ឋបាល',
                'department_id' => 2,
            ],
            [
                'kh_name' => 'ការិយាល័យផែនការនិងរបាយការណ៍',
                'department_id' => 2,
            ],
            [
                'kh_name' => 'ការិយាល័យគណនេយ្យ',
                'department_id' => 2,
            ],
            [
                'kh_name' => 'ការិយាល័យត្រៀមបង្ការ',
                'department_id' => 3,
            ],
            [
                'kh_name' => 'ការិយាល័យភស្តុភារ',
                'department_id' => 3,
            ],
            [
                'kh_name' => 'ការិយាល័យសង្គ្រោះបឋម',
                'department_id' => 4,
            ],
            [
                'kh_name' => 'ការិយាល័យសុខភាពគ្រាអាសន្ន',
                'department_id' => 4,
            ],
            [
                'kh_name' => 'ការិយាល័យការពារជម្ងឺឆ្លង',
                'department_id' => 4,
            ],
            [
                'kh_name' => 'ការិយាល័យកៀរគរមូលនិធិ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ការិយាល័យទំនាក់ទំនងសាធារណះ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ការិយាល័យផ្សព្វផ្សាយ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ការិយាល័យស្តារទំនាក់ទំនងគ្រួសារ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ការិយាល័យបុគ្គលិក',
                'department_id' => 6,
            ],
            [
                'kh_name' => 'ការិយាល័យអភិវឌ្ឍន៍',
                'department_id' => 6,
            ],
        ];

        foreach ($offices as $office) {
            Office::create($office);
        }
    }
}

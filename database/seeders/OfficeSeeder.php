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
                'kh_name' => 'រដ្ឋបាល',
                'department_id' => 2,
            ],
            [
                'kh_name' => 'ផែនការនិងរបាយការណ៍',
                'department_id' => 2,
            ],
            [
                'kh_name' => 'គណនេយ្យ',
                'department_id' => 2,
            ],
            [
                'kh_name' => 'ត្រៀមបង្ការ',
                'department_id' => 3,
            ],
            [
                'kh_name' => 'ភស្តុភារ',
                'department_id' => 3,
            ],
            [
                'kh_name' => 'សង្គ្រោះបឋម',
                'department_id' => 4,
            ],
            [
                'kh_name' => 'សុខភាពគ្រាអាសន្ន',
                'department_id' => 4,
            ],
            [
                'kh_name' => 'ការពារជម្ងឺឆ្លង',
                'department_id' => 4,
            ],
            [
                'kh_name' => 'កៀរគរមូលនិធិ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ទំនាក់ទំនងសាធារណះ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ផ្សព្វផ្សាយ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ស្តារទំនាក់ទំនងគ្រួសារ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'បុគ្គលិក',
                'department_id' => 6,
            ],
            [
                'kh_name' => 'អភិវឌ្ឍន៍',
                'department_id' => 6,
            ],
        ];

        foreach ($offices as $office) {
            Office::create($office);
        }
    }
}

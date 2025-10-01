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
                'kh_name' => 'ការិ.រដ្ឋបាល',
                'department_id' => 2,
            ],
            [
                'kh_name' => 'ការិ.ផែនការពិនិត្យតាមដានវាយតម្លៃ និងរបាយការណ៍',
                'department_id' => 2,
            ],
            [
                'kh_name' => 'ការិ.គណនេយ្យ',
                'department_id' => 2,
            ],
            [
                'kh_name' => 'ការិ.ត្រៀមបង្ការ​ និងកាត់បន្ថយហានិភ័យគ្រោះមហន្តរាយ',
                'department_id' => 3,
            ],
            [
                'kh_name' => 'ការិ.ភស្តុភារ',
                'department_id' => 3,
            ],
            [
                'kh_name' => 'ការិ.សង្គ្រោះបឋម',
                'department_id' => 4,
            ],
            [
                'kh_name' => 'ការិ.សុខភាពគ្រាអាសន្ន',
                'department_id' => 4,
            ],
            [
                'kh_name' => 'ការិ.ការពារជម្ងឺឆ្លង​ និងមិនឆ្លង',
                'department_id' => 4,
            ],
            [
                'kh_name' => 'ការិ.កៀរគរមូលនិធិ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ការិ.ទំនាក់ទំនងសាធារណះ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ការិ.ផ្សព្វផ្សាយ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ការិ.ស្តារទំនាក់ទំនងគ្រួសារ',
                'department_id' => 5,
            ],
            [
                'kh_name' => 'ការិ.បុគ្គលិក',
                'department_id' => 6,
            ],
            [
                'kh_name' => 'ការិ.អភិវឌ្ឍន៍',
                'department_id' => 6,
            ],
        ];

        foreach ($offices as $office) {
            Office::create($office);
        }
    }
}

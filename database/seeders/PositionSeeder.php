<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'kh_name' => 'អគ្គលេខាធិការ',
            ],
            [
                'kh_name' => 'អគ្គលេខាធិការរងទី ១',
            ],
            [
                'kh_name' => 'អគ្គលេខាធិការរងទី ២',
            ],
            [
                'kh_name' => 'នាយកសាខា',
            ],
            [
                'kh_name' => 'នាយករងសាខា',
            ],
            [
                'kh_name' => 'នាយកអនុសាខា',
            ],
            [
                'kh_name' => 'នាយករងអនុសាខា',
            ],
            [
                'kh_name' => 'នាយកនាយកដ្ឋាន',
            ],
            [
                'kh_name' => 'នាយករងនាយកដ្ឋាន',
            ],
            [
                'kh_name' => 'ប្រធានការិយាល័យ',
            ],
            [
                'kh_name' => 'អនុប្រធានការិយាល័យ',
            ],
            [
                'kh_name' => 'មន្រ្តី',
            ],
            [
                'kh_name' => 'អ្នកស្មគ្រ័ចិត្រ',
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}

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
                'male_kh_name' => 'អគ្គលេខាធិការ',
            ],
            [
                'male_kh_name' => 'អគ្គលេខាធិការរងទី ១',
            ],
            [
                'male_kh_name' => 'អគ្គលេខាធិការរងទី ២',
            ],
            [
                'male_kh_name' => 'នាយកសាខា',
                'female_kh_name' => 'នាយិកាសាខា',
            ],
            [
                'male_kh_name' => 'នាយករងសាខា',
                'female_kh_name' => 'នាយិការងសាខា',
            ],
            [
                'male_kh_name' => 'នាយកអនុសាខា',
                'female_kh_name' => 'នាយិកាអនុសាខា',
            ],
            [
                'male_kh_name' => 'នាយករងអនុសាខា',
                'female_kh_name' => 'នាយិការងអនុសាខា',
            ],
            [
                'male_kh_name' => 'នាយកនាយកដ្ឋាន',
                'female_kh_name' => 'នាយិកានាយកដ្ឋាន',
            ],
            [
                'male_kh_name' => 'នាយករងនាយកដ្ឋាន',
                'female_kh_name' => 'នាយិការងនាយកដ្ឋាន',
            ],
            [
                'male_kh_name' => 'ប្រធានការិយាល័យ',
            ],
            [
                'male_kh_name' => 'អនុប្រធានការិយាល័យ',
            ],
            [
                'male_kh_name' => 'មន្រ្តី',
            ],
            [
                'male_kh_name' => 'មន្ត្រីស្មគ្រ័ចិត្រ',
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}

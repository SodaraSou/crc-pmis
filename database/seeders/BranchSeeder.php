<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::insert([
            [
                'id' => 0,
                'kh_name' => 'ស្នាក់ការកណ្តាល',
                'en_name' => 'Headquarters',
                'province_id' => 12,
            ],
            [
                'id' => 1,
                'kh_name' => 'សាខាកក្រក ខេត្តបន្ទាយមានជ័យ',
                'en_name' => 'Banteay Meanchey',
                'province_id' => 1,
            ],
            [
                'id' => 2,
                'kh_name' => 'សាខាកក្រក ខេត្តបាត់ដំបង',
                'en_name' => 'Battambang',
                'province_id' => 2,
            ],
            [
                'id' => 3,
                'kh_name' => 'សាខាកក្រក ខេត្តកំពង់ចាម',
                'en_name' => 'Kampong Cham',
                'province_id' => 3,
            ],
            [
                'id' => 4,
                'kh_name' => 'សាខាកក្រក ខេត្តកំពង់ឆ្នាំង',
                'en_name' => 'Kampong Chhnang',
                'province_id' => 4,
            ],
            [
                'id' => 5,
                'kh_name' => 'សាខាកក្រក ខេត្តកំពង់ស្ពឺ',
                'en_name' => 'Kampong Speu',
                'province_id' => 5,
            ],
            [
                'id' => 6,
                'kh_name' => 'សាខាកក្រក ខេត្តកំពង់ធំ',
                'en_name' => 'Kampong Thom',
                'province_id' => 6,
            ],
            [
                'id' => 7,
                'kh_name' => 'សាខាកក្រក ខេត្តកំពត',
                'en_name' => 'Kampot',
                'province_id' => 7,
            ],
            [
                'id' => 8,
                'kh_name' => 'សាខាកក្រក ខេត្តកណ្ដាល',
                'en_name' => 'Kandal',
                'province_id' => 8,
            ],
            [
                'id' => 9,
                'kh_name' => 'សាខាកក្រក ខេត្តកោះកុង',
                'en_name' => 'Koh Kong',
                'province_id' => 9,
            ],
            [
                'id' => 10,
                'kh_name' => 'សាខាកក្រក ខេត្តក្រចេះ',
                'en_name' => 'Kratie',
                'province_id' => 10,
            ],
            [
                'id' => 11,
                'kh_name' => 'សាខាកក្រក ខេត្តមណ្ឌលគិរី',
                'en_name' => 'Mondul Kiri',
                'province_id' => 11,
            ],
            [
                'id' => 12,
                'kh_name' => 'សាខាកក្រក ខេត្តរាជធានីភ្នំពេញ',
                'en_name' => 'Phnom Penh',
                'province_id' => 12,
            ],
            [
                'id' => 13,
                'kh_name' => 'សាខាកក្រក ខេត្តព្រះវិហារ',
                'en_name' => 'Preah Vihear',
                'province_id' => 13,
            ],
            [
                'id' => 14,
                'kh_name' => 'សាខាកក្រក ខេត្តព្រៃវែង',
                'en_name' => 'Prey Veng',
                'province_id' => 14,
            ],
            [
                'id' => 15,
                'kh_name' => 'សាខាកក្រក ខេត្តពោធិ៍សាត់',
                'en_name' => 'Pursat',
                'province_id' => 15,
            ],
            [
                'id' => 16,
                'kh_name' => 'សាខាកក្រក ខេត្តរតនគិរី',
                'en_name' => 'Ratanak Kiri',
                'province_id' => 16,
            ],
            [
                'id' => 17,
                'kh_name' => 'សាខាកក្រក ខេត្តសៀមរាប',
                'en_name' => 'Siemreap',
                'province_id' => 17,
            ],
            [
                'id' => 18,
                'kh_name' => 'សាខាកក្រក ខេត្តព្រះសីហនុ',
                'en_name' => 'Preah Sihanouk',
                'province_id' => 18,
            ],
            [
                'id' => 19,
                'kh_name' => 'សាខាកក្រក ខេត្តស្ទឹងត្រែង',
                'en_name' => 'Stung Treng',
                'province_id' => 19,
            ],
            [
                'id' => 20,
                'kh_name' => 'សាខាកក្រក ខេត្តស្វាយរៀង',
                'en_name' => 'Svay Rieng',
                'province_id' => 20,
            ],
            [
                'id' => 21,
                'kh_name' => 'សាខាកក្រក ខេត្តតាកែវ',
                'en_name' => 'Takeo',
                'province_id' => 21,
            ],
            [
                'id' => 22,
                'kh_name' => 'សាខាកក្រក ខេត្តឧត្ដរមានជ័យ',
                'en_name' => 'Oddar Meanchey',
                'province_id' => 22,
            ],
            [
                'id' => 23,
                'kh_name' => 'សាខាកក្រក ខេត្តកែប',
                'en_name' => 'Kep',
                'province_id' => 23,
            ],
            [
                'id' => 24,
                'kh_name' => 'សាខាកក្រក ខេត្តប៉ៃលិន',
                'en_name' => 'Pailin',
                'province_id' => 24,
            ],
            [
                'id' => 25,
                'kh_name' => 'សាខាកក្រក ខេត្តត្បូងឃ្មុំ',
                'en_name' => 'Tboung Khmum',
                'province_id' => 25,
            ],
        ]);
    }
}

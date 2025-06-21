<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'kh_name' => 'បន្ទាយមានជ័យ',
                'en_name' => 'Banteay Meanchey',
                'province_id' => 1,
            ],
            [
                'kh_name' => 'បាត់ដំបង',
                'en_name' => 'Battambang',
                'province_id' => 2,
            ],
            [
                'kh_name' => 'កំពង់ចាម',
                'en_name' => 'Kampong Cham',
                'province_id' => 3,
            ],
            [
                'kh_name' => 'កំពង់ឆ្នាំង',
                'en_name' => 'Kampong Chhnang',
                'province_id' => 4,
            ],
            [
                'kh_name' => 'កំពង់ស្ពឺ',
                'en_name' => 'Kampong Speu',
                'province_id' => 5,
            ],
            [
                'kh_name' => 'កំពង់ធំ',
                'en_name' => 'Kampong Thom',
                'province_id' => 6,
            ],
            [
                'kh_name' => 'កំពត',
                'en_name' => 'Kampot',
                'province_id' => 7,
            ],
            [
                'kh_name' => 'កណ្ដាល',
                'en_name' => 'Kandal',
                'province_id' => 8,
            ],
            [
                'kh_name' => 'កោះកុង',
                'en_name' => 'Koh Kong',
                'province_id' => 9,
            ],
            [
                'kh_name' => 'ក្រចេះ',
                'en_name' => 'Kratie',
                'province_id' => 10,
            ],
            [
                'kh_name' => 'មណ្ឌលគិរី',
                'en_name' => 'Mondul Kiri',
                'province_id' => 11,
            ],
            [
                'kh_name' => 'រាជធានីភ្នំពេញ',
                'en_name' => 'Phnom Penh',
                'province_id' => 12,
            ],
            [
                'kh_name' => 'ព្រះវិហារ',
                'en_name' => 'Preah Vihear',
                'province_id' => 13,
            ],
            [
                'kh_name' => 'ព្រៃវែង',
                'en_name' => 'Prey Veng',
                'province_id' => 14,
            ],
            [
                'kh_name' => 'ពោធិ៍សាត់',
                'en_name' => 'Pursat',
                'province_id' => 15,
            ],
            [
                'kh_name' => 'រតនគិរី',
                'en_name' => 'Ratanak Kiri',
                'province_id' => 16,
            ],
            [
                'kh_name' => 'សៀមរាប',
                'en_name' => 'Siemreap',
                'province_id' => 17,
            ],
            [
                'kh_name' => 'ព្រះសីហនុ',
                'en_name' => 'Preah Sihanouk',
                'province_id' => 18,
            ],
            [
                'kh_name' => 'ស្ទឹងត្រែង',
                'en_name' => 'Stung Treng',
                'province_id' => 19,
            ],
            [
                'kh_name' => 'ស្វាយរៀង',
                'en_name' => 'Svay Rieng',
                'province_id' => 20,
            ],
            [
                'kh_name' => 'តាកែវ',
                'en_name' => 'Takeo',
                'province_id' => 21,
            ],
            [
                'kh_name' => 'ឧត្ដរមានជ័យ',
                'en_name' => 'Oddar Meanchey',
                'province_id' => 22,
            ],
            [
                'kh_name' => 'កែប',
                'en_name' => 'Kep',
                'province_id' => 23,
            ],
            [
                'kh_name' => 'ប៉ៃលិន',
                'en_name' => 'Pailin',
                'province_id' => 24,
            ],
            [
                'kh_name' => 'ត្បូងឃ្មុំ',
                'en_name' => 'Tboung Khmum',
                'province_id' => 25,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        Province::insert([
            [
                'id'      => 1,
                'kh_name' => 'បន្ទាយមានជ័យ',
                'en_name' => 'Banteay Meanchey',
            ],
            [
                'id'      => 2,
                'kh_name' => 'បាត់ដំបង',
                'en_name' => 'Battambang',
            ],
            [
                'id'      => 3,
                'kh_name' => 'កំពង់ចាម',
                'en_name' => 'Kampong Cham',
            ],
            [
                'id'      => 4,
                'kh_name' => 'កំពង់ឆ្នាំង',
                'en_name' => 'Kampong Chhnang',
            ],
            [
                'id'      => 5,
                'kh_name' => 'កំពង់ស្ពឺ',
                'en_name' => 'Kampong Speu',
            ],
            [
                'id'      => 6,
                'kh_name' => 'កំពង់ធំ',
                'en_name' => 'Kampong Thom',
            ],
            [
                'id'      => 7,
                'kh_name' => 'កំពត',
                'en_name' => 'Kampot',
            ],
            [
                'id'      => 8,
                'kh_name' => 'កណ្ដាល',
                'en_name' => 'Kandal',
            ],
            [
                'id'      => 9,
                'kh_name' => 'កោះកុង',
                'en_name' => 'Koh Kong',
            ],
            [
                'id'      => 10,
                'kh_name' => 'ក្រចេះ',
                'en_name' => 'Kratie',
            ],
            [
                'id'      => 11,
                'kh_name' => 'មណ្ឌលគិរី',
                'en_name' => 'Mondul Kiri',
            ],
            [
                'id'      => 12,
                'kh_name' => 'រាជធានីភ្នំពេញ',
                'en_name' => 'Phnom Penh',
            ],
            [
                'id'      => 13,
                'kh_name' => 'ព្រះវិហារ',
                'en_name' => 'Preah Vihear',
            ],
            [
                'id'      => 14,
                'kh_name' => 'ព្រៃវែង',
                'en_name' => 'Prey Veng',
            ],
            [
                'id'      => 15,
                'kh_name' => 'ពោធិ៍សាត់',
                'en_name' => 'Pursat',
            ],
            [
                'id'      => 16,
                'kh_name' => 'រតនគិរី',
                'en_name' => 'Ratanak Kiri',
            ],
            [
                'id'      => 17,
                'kh_name' => 'សៀមរាប',
                'en_name' => 'Siemreap',
            ],
            [
                'id'      => 18,
                'kh_name' => 'ព្រះសីហនុ',
                'en_name' => 'Preah Sihanouk',
            ],
            [
                'id'      => 19,
                'kh_name' => 'ស្ទឹងត្រែង',
                'en_name' => 'Stung Treng',
            ],
            [
                'id'      => 20,
                'kh_name' => 'ស្វាយរៀង',
                'en_name' => 'Svay Rieng',
            ],
            [
                'id'      => 21,
                'kh_name' => 'តាកែវ',
                'en_name' => 'Takeo',
            ],
            [
                'id'      => 22,
                'kh_name' => 'ឧត្ដរមានជ័យ',
                'en_name' => 'Oddar Meanchey',
            ],
            [
                'id'      => 23,
                'kh_name' => 'កែប',
                'en_name' => 'Kep',
            ],
            [
                'id'      => 24,
                'kh_name' => 'ប៉ៃលិន',
                'en_name' => 'Pailin',
            ],
            [
                'id'      => 25,
                'kh_name' => 'ត្បូងឃ្មុំ',
                'en_name' => 'Tboung Khmum',
            ],
        ]);
    }
}

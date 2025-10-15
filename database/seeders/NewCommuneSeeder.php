<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Database\Seeder;

class NewCommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commune::insert([
            [
                'id' => 50901,
                'kh_name' => 'វាំងចាស់',
                'en_name' => 'Veang Chas',
                'district_id' => 509,
            ],
            [
                'id' => 50902,
                'kh_name' => 'វាលពង់',
                'en_name' => 'Veal Pong',
                'district_id' => 509,
            ],
            [
                'id' => 50903,
                'kh_name' => 'ត្រាចទង',
                'en_name' => 'Trach Tong',
                'district_id' => 509,
            ],
            [
                'id' => 50904,
                'kh_name' => 'ព្រះស្រែ',
                'en_name' => 'Preah Srae',
                'district_id' => 509,
            ],
            [
                'id' => 50905,
                'kh_name' => 'ក្សេមក្សាន្ដ',
                'en_name' => 'Khsem Khsant',
                'district_id' => 509,
            ],


            [
                'id' => 51001,
                'kh_name' => 'ចាន់សែន',
                'en_name' => 'Chan Saen Commune',
                'district_id' => 510,
            ],
            [
                'id' => 51002,
                'kh_name' => 'ជើងរាស់',
                'en_name' => 'Cheung Roas',
                'district_id' => 510,
            ],
            [
                'id' => 51003,
                'kh_name' => 'ជំពូព្រឹក្ស',
                'en_name' => 'Chumpu Proeks',
                'district_id' => 510,
            ],
            [
                'id' => 51004,
                'kh_name' => 'ក្រាំងចេក',
                'en_name' => 'Krang Chek',
                'district_id' => 510,
            ],
            [
                'id' => 51005,
                'kh_name' => 'មានជ័យ',
                'en_name' => 'Mean Chey',
                'district_id' => 510,
            ],
            [
                'id' => 51006,
                'kh_name' => 'ព្រៃក្រសាំង',
                'en_name' => 'Prey Krasang',
                'district_id' => 510,
            ],
            [
                'id' => 51007,
                'kh_name' => 'យុទ្ធសាមគ្គី',
                'en_name' => 'Yutth Sameakki',
                'district_id' => 510,
            ],
            [
                'id' => 51008,
                'kh_name' => 'ដំណាក់រាំង',
                'en_name' => 'Damnak Reang',
                'district_id' => 510,
            ],
            [
                'id' => 51009,
                'kh_name' => 'ពាំងល្វា',
                'en_name' => 'Peang Lvea',
                'district_id' => 510,
            ],
            [
                'id' => 51010,
                'kh_name' => 'ភ្នំតូច',
                'en_name' => 'Phnom Touch',
                'district_id' => 510,
            ],
            [
                'id' => 70901,
                'kh_name' => 'បឹងទូក',
                'en_name' => 'Boeng Tuk',
                'district_id' => 709,
            ],
            [
                'id' => 70902,
                'kh_name' => 'កោះតូច',
                'en_name' => 'Kaoh Touch',
                'district_id' => 709,
            ],
            [
                'id' => 70903,
                'kh_name' => 'ព្រែកត្នោត',
                'en_name' => 'Preaek Tnoat',
                'district_id' => 709,
            ],
            [
                'id' => 81201,
                'kh_name' => 'ឈើខ្មៅ',
                'en_name' => 'Chheu Kmau',
                'district_id' => 812,
            ],
            [
                'id' => 81202,
                'kh_name' => 'ព្រែកជ្រៃ',
                'en_name' => 'Chheu Kmau',
                'district_id' => 812,
            ],
            [
                'id' => 81203,
                'kh_name' => 'ព្រែកស្ដី',
                'en_name' => 'Chheu Kmau',
                'district_id' => 812,
            ],
            [
                'id' => 81204,
                'kh_name' => 'ជ្រោយតាកែវ',
                'en_name' => 'Chheu Kmau',
                'district_id' => 812,
            ],
            [
                'id' => 81205,
                'kh_name' => 'សំពៅពូន',
                'en_name' => 'Chheu Kmau',
                'district_id' => 812,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class NewDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::insert([
            [
                "id" => 509,
                "kh_name" => "ឧដុង្គម៉ែជ័យ",
                "en_name" => "Odongk Maechay",
                "province_id" => 5,
            ],
            [
                "id" => 510,
                "kh_name" => "សាមគ្គីមុនីជ័យ",
                "en_name" => "Samkkei Munichay",
                "province_id" => 5,
            ],
            [
                "id" => 709,
                "kh_name" => "បូកគោ",
                "en_name" => "Bokor",
                "province_id" => 7,
            ],
            [
                "id" => 812,
                "kh_name" => "សំពៅពូន",
                "en_name" => "Sampeou Poun",
                "province_id" => 8,
            ],
            [
                "id" => 813,
                "kh_name" => "អរិយក្សត្រ",
                "en_name" => "Akreiy Ksatr",
                "province_id" => 8,
            ],
            [
                "id" => 1007,
                "kh_name" => "អូរគ្រៀងសែនជ័យ",
                "en_name" => "Ou Krieng Saenchey",
                "province_id" => 10,
            ],
            [
                "id" => 1715,
                "kh_name" => "រុនតាឯកតេជោសែន",
                "en_name" => "Run Ta Aek Techo Sen",
                "province_id" => 17,
            ],
            [
                "id" => 1806,
                "kh_name" => "កំពង់សោម",
                "en_name" => "Kampong Soam",
                "province_id" => 18,
            ],
        ]);
    }
}

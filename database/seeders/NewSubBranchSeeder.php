<?php

namespace Database\Seeders;

use App\Models\SubBranch;
use Illuminate\Database\Seeder;

class NewSubBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubBranch::insert([
            [
                "id" => 509,
                "kh_name" => "អនុសាខាកក្រក ក្រុងឧដុង្គម៉ែជ័យ",
                "en_name" => "Odongk Maechay",
                "branch_id" => 5,
                "district_id" => 509,
            ],
            [
                "id" => 510,
                "kh_name" => "អនុសាខាកក្រក ស្រុកសាមគ្គីមុនីជ័យ",
                "en_name" => "Samkkei Munichay",
                "branch_id" => 5,
                "district_id" => 509,
            ],
            [
                "id" => 709,
                "kh_name" => "អនុសាខាកក្រក ក្រុងបូកគោ",
                "en_name" => "Bokor",
                "branch_id" => 7,
                "district_id" => 709,
            ],
            [
                "id" => 812,
                "kh_name" => "អនុសាខាកក្រក ក្រុងសំពៅពូន",
                "en_name" => "Sampeou Poun",
                "branch_id" => 8,
                "district_id" => 812,
            ],
            [
                "id" => 813,
                "kh_name" => "អនុសាខាកក្រក ក្រុងអរិយក្សត្រ",
                "en_name" => "Akreiy Ksatr",
                "branch_id" => 8,
                "district_id" => 813,
            ],
            [
                "id" => 1007,
                "kh_name" => "អនុសាខាកក្រក ស្រុកអូរគ្រៀងសែនជ័យ",
                "en_name" => "Ou Krieng Saenchey",
                "branch_id" => 10,
                "district_id" => 1007,
            ],
            [
                "id" => 1715,
                "kh_name" => "អនុសាខាកក្រក ក្រុងរុនតាឯកតេជោសែន",
                "en_name" => "Run Ta Aek Techo Sen",
                "branch_id" => 17,
                "district_id" => 1715,
            ],
            [
                "id" => 1806,
                "kh_name" => "អនុសាខាកក្រក ក្រុងកំពង់សោម",
                "en_name" => "Kampong Soam",
                "branch_id" => 18,
                "district_id" => 1806,
            ],
        ]);
    }
}

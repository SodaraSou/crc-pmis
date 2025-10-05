<?php

namespace Database\Seeders;

use App\Models\Committee;
use Illuminate\Database\Seeder;

class NewCommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Committee::insert([
            [
                "kh_name" => "គណ:កិត្តិយសអនុសាខា ក្រុងឧដុង្គម៉ែជ័យ",
                "en_name" => "Odongk Maechay",
                "branch_id" => 5,
                "sub_branch_id" => 509,
                'committee_type_id' => 1,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កិត្តិយសអនុសាខា ស្រុកសាមគ្គីមុនីជ័យ",
                "en_name" => "Odongk Maechay",
                "branch_id" => 5,
                "sub_branch_id" => 510,
                'committee_type_id' => 1,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កិត្តិយសអនុសាខា ក្រុងបូកគោ",
                "en_name" => "Bokor",
                "branch_id" => 7,
                "sub_branch_id" => 709,
                'committee_type_id' => 1,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កិត្តិយសអនុសាខា ក្រុងសំពៅពូន",
                "en_name" => "Sampeou Poun",
                "branch_id" => 8,
                "sub_branch_id" => 812,
                'committee_type_id' => 1,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កិត្តិយសអនុសាខា ក្រុងអរិយក្សត្រ",
                "en_name" => "Akreiy Ksatr",
                "branch_id" => 8,
                "sub_branch_id" => 813,
                'committee_type_id' => 1,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កិត្តិយសអនុសាខា ស្រុកអូរគ្រៀងសែនជ័យ",
                "en_name" => "Ou Krieng Saenchey",
                "branch_id" => 10,
                "sub_branch_id" => 1007,
                'committee_type_id' => 1,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កិត្តិយសអនុសាខា ក្រុងរុនតាឯកតេជោសែន",
                "en_name" => "Run Ta Aek Techo Sen",
                "branch_id" => 17,
                "sub_branch_id" => 1715,
                'committee_type_id' => 1,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កិត្តិយសអនុសាខា ក្រុងកំពង់សោម",
                "en_name" => "Kampong Soam",
                "branch_id" => 18,
                "sub_branch_id" => 1806,
                'committee_type_id' => 1,
                'committee_level_id' => 3,
            ],
            // Regular Committee
            [
                "kh_name" => "គណ:កម្មាធិការអនុសាខា ក្រុងឧដុង្គម៉ែជ័យ",
                "en_name" => "Odongk Maechay",
                "branch_id" => 5,
                "sub_branch_id" => 509,
                'committee_type_id' => 2,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កម្មាធិការអនុសាខា ស្រុកសាមគ្គីមុនីជ័យ",
                "en_name" => "Odongk Maechay",
                "branch_id" => 5,
                "sub_branch_id" => 510,
                'committee_type_id' => 2,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កម្មាធិការអនុសាខា ក្រុងបូកគោ",
                "en_name" => "Bokor",
                "branch_id" => 7,
                "sub_branch_id" => 709,
                'committee_type_id' => 2,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កម្មាធិការអនុសាខា ក្រុងសំពៅពូន",
                "en_name" => "Sampeou Poun",
                "branch_id" => 8,
                "sub_branch_id" => 812,
                'committee_type_id' => 2,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កម្មាធិការអនុសាខា ក្រុងអរិយក្សត្រ",
                "en_name" => "Akreiy Ksatr",
                "branch_id" => 8,
                "sub_branch_id" => 813,
                'committee_type_id' => 2,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កម្មាធិការអនុសាខា ស្រុកអូរគ្រៀងសែនជ័យ",
                "en_name" => "Ou Krieng Saenchey",
                "branch_id" => 10,
                "sub_branch_id" => 1007,
                'committee_type_id' => 2,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កម្មាធិការអនុសាខា ក្រុងរុនតាឯកតេជោសែន",
                "en_name" => "Run Ta Aek Techo Sen",
                "branch_id" => 17,
                "sub_branch_id" => 1715,
                'committee_type_id' => 2,
                'committee_level_id' => 3,
            ],
            [
                "kh_name" => "គណ:កម្មាធិការអនុសាខា ក្រុងកំពង់សោម",
                "en_name" => "Kampong Soam",
                "branch_id" => 18,
                "sub_branch_id" => 1806,
                'committee_type_id' => 2,
                'committee_level_id' => 3,
            ],
        ]);
    }
}

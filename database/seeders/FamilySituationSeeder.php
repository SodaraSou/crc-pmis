<?php

namespace Database\Seeders;

use App\Models\FamilySituation;
use Illuminate\Database\Seeder;

class FamilySituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $family_situations = [
            [
                'kh_name' => 'នៅលីវ',
                'en_name' => 'Single',
            ],
            [
                'kh_name' => 'មានគ្រួសារ',
                'en_name' => 'Married',
            ],
        ];

        foreach ($family_situations as $family_situation) {
            FamilySituation::create($family_situation);
        }
    }
}

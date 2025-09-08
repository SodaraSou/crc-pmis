<?php

namespace Database\Seeders;

use App\Models\CommitteeType;
use Illuminate\Database\Seeder;

class CommitteeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CommitteeType::insert([
            [
                'kh_name' => 'គណ:កិត្តិយស',
                'en_name' => 'Honorary Committee',
            ],
            [
                'kh_name' => 'គណៈកម្មាធិការ',
                'en_name' => 'Committee'
            ]
        ]);
    }
}

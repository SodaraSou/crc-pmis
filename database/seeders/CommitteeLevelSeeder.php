<?php

namespace Database\Seeders;

use App\Models\CommitteeLevel;
use Illuminate\Database\Seeder;

class CommitteeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CommitteeLevel::insert([
            [
                'en_name' => 'Headquarter Level',
                'kh_name' => 'កណ្តាល',
            ],
            [
                'en_name' => 'Branch Level',
                'kh_name' => 'សាខា',
            ],
            [
                'en_name' => 'Sub-branch Level',
                'kh_name' => 'អនុសាខា',
            ],
        ]);
    }
}

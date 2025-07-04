<?php

namespace Database\Seeders;

use App\Models\UserLevel;
use Illuminate\Database\Seeder;

class UserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserLevel::insert([
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
            [
                'en_name' => 'Group Level',
                'kh_name' => 'ក្រុមអនុសាខា',
            ],
        ]);
    }
}

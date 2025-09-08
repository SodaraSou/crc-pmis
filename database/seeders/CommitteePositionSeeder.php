<?php

namespace Database\Seeders;

use App\Models\CommitteePosition;
use Illuminate\Database\Seeder;

class CommitteePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CommitteePosition::insert([
            [
                'kh_name' => 'ប្រធាន',
                'en_name' => 'President',
            ],
            [
                'kh_name' => 'អនុប្រធាន',
                'en_name' => 'Vice President',
            ],
            [
                'kh_name' => 'អនុប្រធានអចិន្ត្រៃយ៍',
                'en_name' => 'Permanent Vice President',
            ],
            [
                'kh_name' => 'សមាជិក',
                'en_name' => 'Member',
            ],
        ]);
    }
}

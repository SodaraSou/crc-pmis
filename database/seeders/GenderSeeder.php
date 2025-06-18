<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::insert([
            [
                'en_name' => 'Female',
                'kh_name' => 'ស្រី',
                'en_abbr' => 'F',
                'kh_abbr' => 'ស'
            ],
            [
                'en_name' => 'Male',
                'kh_name' => 'ប្រុស',
                'en_abbr' => 'M',
                'kh_abbr' => 'ប'
            ],
        ]);
    }
}

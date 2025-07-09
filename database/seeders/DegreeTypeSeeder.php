<?php

namespace Database\Seeders;

use App\Models\DegreeType;
use Illuminate\Database\Seeder;

class DegreeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DegreeType::insert([
            [
                'kh_name' => 'សញ្ញាបត្របឋមភូមិ',
            ],
            [
                'kh_name' => 'សញ្ញាបត្រទុតិយភូមិ',
            ],
            [
                'kh_name' => 'បរិញ្ញាបត្ររង',
            ],
            [
                'kh_name' => 'បរិញ្ញាបត្រ',
            ],
            [
                'kh_name' => 'ថ្នាក់អនុបណ្ឌិត',
            ],
            [
                'kh_name' => 'ថ្នាក់បណ្ឌិត',
            ],
        ]);
    }
}

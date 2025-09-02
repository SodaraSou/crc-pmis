<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GenderSeeder::class,
            UserLevelSeeder::class,
            DepartmentSeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            CommuneSeeder::class,
            VillageSeeder::class,
            BranchSeeder::class,
            SubBranchSeeder::class,
            // GroupSeeder::class,
            UserSeeder::class,
            OfficeSeeder::class,
            PositionSeeder::class,
            FamilySituationSeeder::class,
            EmployeeStatusSeeder::class,
            DegreeTypeSeeder::class,
        ]);
    }
}

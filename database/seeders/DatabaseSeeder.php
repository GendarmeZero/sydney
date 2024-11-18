<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            UserSeeder::class,
            AchievementSeeder::class,
            SkillSeeder::class,
            TaskSeeder::class,
            SalarySeeder::class,
            AddressesTableSeeder::class,
            EmployeeStatusSeeder::class,
            EventSeeder::class,
        ]);
    }
}


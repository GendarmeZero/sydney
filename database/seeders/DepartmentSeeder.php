<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('departments')->insert([
            [
                'name' => 'Sales',
                'location' => 'New York',
                'description' => 'Handles the company\'s sales operations',
                'budget' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Human Resources',
                'location' => 'San Francisco',
                'description' => 'Manages recruitment and employee relations',
                'budget' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IT Support',
                'location' => 'Chicago',
                'description' => 'Provides IT infrastructure and support',
                'budget' => 75000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        // Sample data
        $employees = [
            [
                'first_name' => 'John',
                'middle_name' => 'A',
                'last_name' => 'Doe',
                'age' => 30,
                'email' => 'john.doe@example.com',
                'address' => '123 Main St, Cityville',
                'mobile' => '1234567890',
                'house_phone' => '0987654321',
                'status' => 'active',
                'degree_score' => 3.75,
                'work_start_date' => '2022-01-15',
                'paid_vacation_time' => 10,
                'no_show_count' => 1,
                'hourly_rate' => 25.50,
                'annual_salary' => 53000.00,
                'achievements_count' => 5,
                'social_security_number' => '123-45-6789',
                'has_car' => true,
                'kids_number' => 2,
                'nationality' => 'American',
                'military_service' => 'no',
                'sex' => 'male',
            ],
            [
                'first_name' => 'Jane',
                'middle_name' => 'B',
                'last_name' => 'Smith',
                'age' => 28,
                'email' => 'jane.smith@example.com',
                'address' => '456 Elm St, Townsville',
                'mobile' => '9876543210',
                'house_phone' => null,
                'status' => 'inactive',
                'degree_score' => 3.90,
                'work_start_date' => '2021-05-20',
                'paid_vacation_time' => 5,
                'no_show_count' => 0,
                'hourly_rate' => 30.00,
                'annual_salary' => 62000.00,
                'achievements_count' => 8,
                'social_security_number' => '987-65-4321',
                'has_car' => false,
                'kids_number' => null,
                'nationality' => 'Canadian',
                'military_service' => 'yes',
                'sex' => 'female',
            ],
            // Add more sample records as needed
        ];

        // Insert data into the employees table
        DB::table('employees')->insert($employees);
    }
}

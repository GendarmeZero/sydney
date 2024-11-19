<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentManagersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('department_managers')->insert([
            [
                'department_id' => 1, // Sales department ID
                'user_id' => 1, // John Doe (Manager for Sales)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 2, // HR department ID
                'user_id' => 2, // Jane Smith (Manager for HR)
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $departments = ['HR', 'Sales', 'Marketing', 'IT', 'Finance', 'Customer Service'];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

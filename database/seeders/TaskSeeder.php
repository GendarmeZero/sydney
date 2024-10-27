<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            DB::table('tasks')->insert([
                'employee_id' => $user->id,
                'total_tasks' => $total = rand(5, 20),
                'tasks_done' => $done = rand(0, $total),
                'tasks_failed' => $failed = rand(0, $total - $done),
                'tasks_switched' => $total - ($done + $failed),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

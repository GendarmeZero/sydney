<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AchievementSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            DB::table('achievements')->insert([
                'employee_id' => $user->id,
                'description' => 'Completed a major project successfully',
                'date' => now()->subDays(rand(1, 365)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

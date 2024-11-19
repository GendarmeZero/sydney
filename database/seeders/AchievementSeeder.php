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
                [
                    'title' => 'Mass Production',
                    'description' => 'Complete 100 tasks',
                    'date' => now()->subDays(rand(1, 365)),
                    'image_path' => 'storage/images/mass_production.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'The First Step',
                    'description' => 'Join the Company',
                    'date' => now()->subDays(rand(1, 365)),
                    'image_path' => 'storage/images/the_first_step.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Show Off',
                    'description' => 'Earn 5 achievements',
                    'date' => now()->subDays(rand(1, 365)),
                    'image_path' => 'storage/images/show_off.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}

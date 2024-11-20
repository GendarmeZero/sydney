<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Achievement;
use App\Models\User;

class AchievementSeeder extends Seeder
{
    public function run()
    {
        // Create the achievements
        $achievements = [
            [
                'title' => 'Mass Production',
                'description' => 'Complete 100 tasks',
                'date' => now()->subDays(rand(1, 365)),
                'image_path' => 'achievement_images/mass_production.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The First Step',
                'description' => 'Join the Company',
                'date' => now()->subDays(rand(1, 365)),
                'image_path' => 'achievement_images/the_first_step.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Show Off',
                'description' => 'Earn 5 achievements',
                'date' => now()->subDays(rand(1, 365)),
                'image_path' => 'achievement_images/show_off.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // Insert the achievements into the database
        foreach ($achievements as $achievement) {
            $createdAchievement = Achievement::create($achievement);

            // Associate each achievement with a random set of users
            $users = User::inRandomOrder()->take(rand(1, 5))->get(); // Assign 1-5 random users to this achievement
            $createdAchievement->users()->sync($users); // Use sync to associate users with achievement
        }
    }
}


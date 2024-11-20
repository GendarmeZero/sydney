<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        // Define skills and proficiency levels
        $skills = ['PHP', 'JavaScript', 'Project Management', 'Data Analysis', 'Python', 'Communication'];
        $proficiencies = ['beginner', 'intermediate', 'expert'];

        // Insert skills into the skills table if they don't exist
        foreach ($skills as $skill) {
            Skill::firstOrCreate(['skill' => $skill]);
        }

        // Get all users
        $users = User::all();

        // Assign skills to users with proficiency levels
        foreach ($users as $user) {
            foreach ($skills as $skill) {
                // Get skill id
                $skillId = Skill::where('skill', $skill)->first()->id;

                // Check if the user already has this skill
                $existingSkill = DB::table('user_skills')
                    ->where('user_id', $user->id)
                    ->where('skill_id', $skillId)
                    ->exists();

                // Only insert if the user doesn't already have this skill
                if (!$existingSkill) {
                    DB::table('user_skills')->insert([
                        'user_id' => $user->id,
                        'skill_id' => $skillId,
                        'proficiency' => $proficiencies[array_rand($proficiencies)],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}

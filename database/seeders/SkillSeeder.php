<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SkillSeeder extends Seeder
{
    public function run()
    {
        $skills = ['PHP', 'JavaScript', 'Project Management', 'Data Analysis', 'Python', 'Communication'];
        $proficiencies = ['beginner', 'intermediate', 'expert'];
        $users = User::all();

        foreach ($users as $user) {
            foreach ($skills as $skill) {
                DB::table('skills')->insert([
                    'employee_id' => $user->id,
                    'skill' => $skill,
                    'proficiency' => $proficiencies[array_rand($proficiencies)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

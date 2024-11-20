<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function skillsList()
    {
        // Fetch all skills
        $skills = Skill::all();
        return view('dashboard.skills.index', compact('skills'));
    }

    public function assignSkill(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'user_id' => 'required|exists:users,id',
            'proficiency' => 'required|in:beginner,intermediate,expert',
        ]);

        // Check if the user already has the skill assigned
        $user = User::find($request->user_id);
        $skillId = $request->skill_id;

        // Check if the user already has this skill assigned
        $existingSkill = $user->skills()->where('skill_id', $skillId)->first();

        if ($existingSkill) {
            // If the skill already exists for the user, update the proficiency
            $user->skills()->updateExistingPivot($skillId, ['proficiency' => $request->proficiency]);
        } else {
            // If the skill does not exist for the user, attach it with the proficiency
            $user->skills()->attach($skillId, ['proficiency' => $request->proficiency]);
        }

        // Return a response or redirect
        return redirect()->back()->with('success', 'Skill assigned successfully!');
    }

    public function addSkill(Request $request)
    {
        $validated = $request->validate([
            'skill' => 'required|string|max:255|unique:skills,skill',
        ]);

        Skill::create($validated);

        return redirect()->route('skills.index')->with('success', 'Skill added successfully!');
    }
    public function showUsers(Skill $skill)
    {
        // Get all users with this skill
        $users = $skill->users()->get();  // Assuming you have the relationship set up

        return view('dashboard.skills.users', compact('skill', 'users'));
    }
}

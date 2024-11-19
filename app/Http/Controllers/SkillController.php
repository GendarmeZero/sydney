<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        // Fetch all skills and their associated users (if any)
        $skills = Skill::with('user')->get();
        $users = User::all(); // Fetch all users for assigning skills

        return view('dashboard.skills.index', compact('skills', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill' => 'required|string|max:100',
            'proficiency' => 'required|in:beginner,intermediate,expert',
        ]);

        // Create a new skill, no need to provide employee_id initially
        Skill::create([
            'skill' => $request->skill,
            'proficiency' => $request->proficiency,
            // No employee_id is required here
        ]);

        return redirect()->route('skills.index');
    }

    public function delete($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('skills.index');
    }

    public function assignUser(Request $request, $id)
    {
        // Validate that a user is selected
        $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure user exists in the users table
        ]);

        $skill = Skill::findOrFail($id);

        // Associate the selected user to the skill
        $skill->user()->associate($request->user_id);
        $skill->save();

        return redirect()->route('skills.index');
    }


    public function assigned()
    {
        // Get all skills with their assigned users
        $skills = Skill::with('user')->get();
        return view('dashboard.skills.assigned', compact('skills'));
    }
}

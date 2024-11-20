<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\User;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    // Show all achievements
    public function index()
    {
        $achievements = Achievement::all();
        return view('dashboard.Achievements.index', compact('achievements'));
    }

    // Show form to create a new achievement
    public function create()
    {
        return view('dashboard.Achievements.create');
    }

    // Store a new achievement
    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the form submission
        $achievement = new Achievement();
        $achievement->title = $validatedData['title'];
        $achievement->description = $validatedData['description'];
        $achievement->date = $validatedData['date'];

        // Handle the image upload if provided
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('achievements', 'public');
            $achievement->image_path = $imagePath;
        }

        $achievement->save();

        return redirect()->route('achievements.index')->with('success', 'Achievement created successfully!');
    }

    // Show form to assign achievement to users
    public function assign($id)
    {
        $achievement = Achievement::findOrFail($id);
        $users = User::all();
        return view('dashboard.Achievements.assign', compact('achievement', 'users'));
    }

    // Store the assignment of achievement to users
    public function storeAssignment(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'users' => 'required|array|min:1',  // Ensure at least one user is selected
            'users.*' => 'exists:users,id',      // Ensure that the selected users exist in the users table
        ]);

        $achievement = Achievement::findOrFail($id);
        $users = $request->input('users'); // An array of user IDs to assign the achievement to

        // Sync the users with the achievement, storing the relationship in the pivot table
        $achievement->users()->sync($users);  // 'sync' will add and remove users

        return redirect()->route('achievements.index')->with('success', 'Users assigned to achievement successfully!');
    }

    // Show users assigned to a specific achievement
    public function showUsers($id)
    {
        $achievement = Achievement::findOrFail($id);
        $users = $achievement->users; // Get all users assigned to this achievement
        return view('dashboard.Achievements.showUsers', compact('achievement', 'users'));
    }

    // Remove the assignment of a user from an achievement
    public function removeAssignment($achievementId, $userId)
    {
        $achievement = Achievement::findOrFail($achievementId);
        $user = User::findOrFail($userId);

        // Remove the user from the achievement's pivot table (unassign user)
        $achievement->users()->detach($userId); // This will unassign the user from the achievement

        return redirect()->route('achievements.showUsers', $achievementId)
            ->with('success', 'User unassigned from achievement successfully!');
    }
}

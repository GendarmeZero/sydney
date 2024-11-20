<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    // Display a listing of the interviews
    public function index()
    {
        $interviews = Interview::with(['user', 'resume'])->get(); // Eager load related user and resume
        return view('dashboard.interviews.index', compact('interviews'));
    }

    // Show the form for creating a new interview
    public function create()
    {
        $users = User::all(); // Get all users
        $resumes = Resume::all(); // Get all resumes
        return view('dashboard.interviews.create', compact('users', 'resumes'));
    }

    // Store a newly created interview in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'interview_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'resume_id' => 'required|exists:resumes,id',
        ]);

        Interview::create($validatedData);

        return redirect()->route('interviews.index')->with('success', 'Interview created successfully!');
    }

    // Show the form for editing an interview
    public function edit($id)
    {
        $interview = Interview::findOrFail($id);
        $users = User::all(); // Get all users
        $resumes = Resume::all(); // Get all resumes
        return view('dashboard.interviews.edit', compact('interview', 'users', 'resumes'));
    }

    // Update the specified interview in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'interview_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'resume_id' => 'required|exists:resumes,id',
        ]);

        $interview = Interview::findOrFail($id);
        $interview->update($validatedData);

        return redirect()->route('interviews.index')->with('success', 'Interview updated successfully!');
    }

    // Remove the specified interview from the database
    public function destroy($id)
    {
        $interview = Interview::findOrFail($id);
        $interview->delete();

        return redirect()->route('interviews.index')->with('success', 'Interview deleted successfully!');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Department;
use App\Models\AdditionalInformation;
use App\Models\Resume;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;

class UsersController extends Controller
{


    public function dashboard()
    {
        // Eager load the 'employeeStatus' relationship for all users
        $users = User::with('employeeStatus')->get();

        // User data for stats
        $maleCount = $users->where('sex', 'Male')->count();
        $femaleCount = $users->where('sex', 'Female')->count();
        $allUsersCount = $users->count();
        $adminCount = User::where('role', 'admin')->count();
        $employeeCount = User::where('role', 'employee')->count();
        $managerCount = User::where('role', 'manager')->count();

        // Count statuses by employeeStatus relation
        $working = $users->filter(function ($user) {
            return $user->employeeStatus && $user->employeeStatus->status === 'working';
        })->count();

        $notWorking = $users->filter(function ($user) {
            return $user->employeeStatus && $user->employeeStatus->status === 'not working';
        })->count();

        $onVacation = $users->filter(function ($user) {
            return $user->employeeStatus && $user->employeeStatus->status === 'on vacation';
        })->count();

        // Fetch the latest resume uploaded
        $latestResume = \App\Models\Resume::latest()->first();

        // Fetch latest events
        $latestEvents = Event::orderBy('created_at', 'desc')->take(3)->get();

        return view('dashboard.dashboard')
            ->with('users', $users)
            ->with('maleCount', $maleCount)
            ->with('femaleCount', $femaleCount)
            ->with('allUsersCount', $allUsersCount)
            ->with('working', $working)
            ->with('notWorking', $notWorking)
            ->with('onVacation', $onVacation)
            ->with('adminCount', $adminCount)
            ->with('employeeCount', $employeeCount)
            ->with('managerCount', $managerCount)
            ->with('latestEvents', $latestEvents)
            ->with('latestResume', $latestResume); // Add latest resume data
    }


    public function show(Request $request)
    {
        $users = User::paginate(10);
        $adminCount = User::where('role', 'admin')->count();
        $employeeCount = User::where('role', 'employee')->count();
        $managerCount = User::where('role', 'manager')->count();

        return view('dashboard.employees.employees')
            ->with('users', $users)
            ->with('adminCount', $adminCount)
            ->with('employeeCount', $employeeCount)
            ->with('managerCount', $managerCount);
    }

    // Create user method
    public function create()
    {
        $departments = Department::all();
        return view('dashboard.employees.create', compact('departments'));
    }

    // Edit user method
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.employees.edit')->with('user', $user);
    }

    // Update user method
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'role' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('users.show')->with('success', 'User updated successfully!');
    }

    // Delete user method
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.show')->with('success', 'User deleted successfully!');
    }

    // Store user method
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'sex' => 'nullable|in:Male,Female',
            'role' => 'required|string|in:manager,admin,employee',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'work_location' => 'nullable|in:onsite,remotely',
            'status' => 'nullable|in:single,married,divorced',
            'department_id' => 'nullable|exists:departments,id',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate profile image
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Validate resume file
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'middleName' => $validatedData['middleName'],
            'lastName' => $validatedData['lastName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'sex' => $validatedData['sex'],
            'role' => $validatedData['role'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'work_location' => $validatedData['work_location'],
            'status' => $validatedData['status'],
            'department_id' => $validatedData['department_id'],
        ]);



        // Handle the profile image upload (if exists)
        $profileImagePath = null;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $profileImagePath = $file->storeAs('profile_images', time() . '.' . $file->getClientOriginalExtension(), 'public');
        }

        // Store the profile image and resume information in the 'additional_information' table
        if ($profileImagePath || isset($resume)) {
            AdditionalInformation::create([
                'user_id' => $user->id,
                'profile_image' => $profileImagePath, // Store profile image path
                'resume_id' => $resume->id ?? null, // Link resume ID if available
            ]);
        }

        // Redirect to the user list with a success message
        return redirect()->route('users.show')->with('success', 'User created successfully!');
    }


    // Profile method to show user details
    public function profile($id)
    {
        $user = User::findOrFail($id);

        $additionalInfo = $user->additionalInformation;

        return view('dashboard.employees.profile', compact('user', 'additionalInfo'));
    }
    public function showProfile()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the additional info for the user, including resume details
        $additionalInfo = $user->additionalInfo; // Assuming you have a relationship 'additionalInfo' on the User model

        // Return the profile view with the user and their additional info
        return view('dashboard.profile', compact('user', 'additionalInfo'));
    }



}

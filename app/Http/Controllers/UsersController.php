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
use Illuminate\Support\Facades\Auth;

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
        $user = User::findOrFail($id);  // Find the user
        $departments = Department::all();  // Fetch departments
        $resumes = Resume::all();  // Fetch all resumes to display in the dropdown

        return view('dashboard.employees.edit', compact('user', 'departments', 'resumes'));
    }

    // Update user method
    public function update(Request $request, $id)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string',
            'work_location' => 'nullable|string',
            'hourly_paid' => 'nullable|numeric',
            'status' => 'nullable|string',
            'address' => 'nullable|string|max:500',
            'department_id' => 'nullable|exists:departments,id', // Validate department
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'resume_id' => 'nullable|exists:resumes,id',  // Validate the resume_id
        ]);

        // Find the user
        $user = User::findOrFail($id);

        // Update user fields
        $user->update([
            'name' => $validatedData['name'],
            'middleName' => $validatedData['middleName'] ?? $user->middleName,
            'lastName' => $validatedData['lastName'] ?? $user->lastName,
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'] ?? $user->phone,
            'role' => $validatedData['role'],
            'work_location' => $validatedData['work_location'] ?? $user->work_location,
            'hourly_paid' => $validatedData['hourly_paid'] ?? $user->hourly_paid,
            'status' => $validatedData['status'] ?? $user->status,
            'address' => $validatedData['address'] ?? $user->address,
            'department_id' => $validatedData['department_id'] ?? $user->department_id, // Update department_id
        ]);

        // Handle password update (only if provided)
        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Handle profile image upload (only if provided)
        if ($request->hasFile('profile_image')) {
            // Store the image
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');

            // Save the image path to an additional information field or user model
            if ($user->additionalInformation) {
                $user->additionalInformation->update(['profile_image' => $imagePath]);
            } else {
                $user->additionalInformation()->create(['profile_image' => $imagePath]);
            }
        }

        // Save the selected resume to additional_information
        if ($request->has('resume_id')) {
            if ($user->additionalInformation) {
                $user->additionalInformation->update(['resume_id' => $request->resume_id]);
            } else {
                $user->additionalInformation()->create(['resume_id' => $request->resume_id]);
            }
        }

        // Redirect back with a success message
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
        $additionalInfo = $user->additionalInformation; // Assuming you have a relationship 'additionalInformation' on the User model

        // Return the profile view with the user and their additional info
        return view('dashboard.profile', compact('user', 'additionalInfo'));
    }
    public function showDepartmentManager($departmentId)
    {
        $department = Department::findOrFail($departmentId);

        // Fetch the manager (assuming there's a 'role' field in the User model)
        $manager = User::where('role', 'manager')
            ->where('department_id', $departmentId)
            ->first();  // Get the first manager for the department

        return view('dashboard.departments.show', compact('department', 'manager'));
    }





}

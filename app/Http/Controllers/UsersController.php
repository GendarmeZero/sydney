<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Couchbase\Role;

class UsersController extends Controller
{
    public function dashboard()
    {
        $users = User::all();



        //User data for statics
        $maleCount = $users->where('sex', 'Male')->count();
        $femaleCount = $users->where('sex', 'Female')->count();
        $allUsersCount = User::all()->count();
        $working = $users->where('employee_statuses','working')->count(); ;
        $notWorking = $users->where('employee_statuses','not working')->count(); ;
        $onVacation = $users->where('employee_statuses','on vacation')->count(); ;


        return view('dashboard.dashboard')
            ->with('users', $users)
            ->with('maleCount', $maleCount)
            ->with('femaleCount', $femaleCount)
            ->with('allUsersCount', $allUsersCount)
            ->with('working', $working)
            ->with('notWorking', $notWorking)
            ->with('onVacation', $onVacation);
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
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'role' => 'required|string',
        ]);

        // Create a new user
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'company' => $validatedData['company'],
            'country' => $validatedData['country'],
            'role' => $validatedData['role'],
            'password' => Hash::make('default_password'),
        ]);

        // Redirect or return response
        return redirect()->back()->with('success', 'User added successfully!');
    }
    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.employees.profile')->with('user', $user);
    }
}

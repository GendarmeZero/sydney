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


        return view('dashboard.dashboard')->with('users',$users);
    }
    public function show()
    {
        $users = User::all();
        $adminCount = User::where('role', 'admin')->count();
        $employeeCount = User::where('role', 'employee')->count();
        $managerCount = User::where('role', 'manager')->count();




        return view('dashboard.employees.employees')
            ->with('users',$users)
            ->with('adminCount',$adminCount)->with('employeeCount',$employeeCount)->with('managerCount',$managerCount);
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
}

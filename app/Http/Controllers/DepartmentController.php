<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{
    // Display a list of all departments
    public function index()
    {
        // Paginate departments here (this will be used in the index page)
        $departments = Department::paginate(9); // Paginate departments for the index

        return view('dashboard.departments.index', compact('departments')); // Return the view with departments
    }

    // Display details of a specific department
    public function show($id)
    {
        // Fetch the department by ID
        $department = Department::findOrFail($id);

        // Fetch all managers based on the department_id
        $managers = User::where('role', 'manager')->where('department_id', $id)->get();

        // Fetch all employees based on the department_id
        $employees = User::where('role', 'employee')->where('department_id', $id)->get();

        // Pass the department, managers, and employees to the view
        return view('dashboard.departments.show', compact('department', 'managers', 'employees'));
    }
}


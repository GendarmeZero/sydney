<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('employees.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:employees',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'status' => 'required|string|max:20',
            'degree_score' => 'required|numeric',
            'work_start_date' => 'required|date',
            'hourly_rate' => 'required|numeric',
            'annual_salary' => 'required|numeric',
            'social_security_number' => 'required|string|max:11',
            // Add other fields as needed
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    // Display the specified resource
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    // Show the form for editing the specified resource
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'status' => 'required|string|max:20',
            'degree_score' => 'required|numeric',
            'work_start_date' => 'required|date',
            'hourly_rate' => 'required|numeric',
            'annual_salary' => 'required|numeric',
            'social_security_number' => 'required|string|max:11',
            // Add other fields as needed
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function dashboard()
    {
        // Retrieve all users
        $users = User::all();

        // Pass users to the view
        return view('dashboard.dashboard')->with('users',$users);
    }
}

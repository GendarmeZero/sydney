<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function choosePlan(Request $request)
    {
        // Assuming you have the user authenticated and using the auth system
        $user = auth()->user();

        // Check if the plan selected is Standard
        if ($request->plan === 'standard') {
            // Update the user's role to admin
            $user->role = 'admin';  // or whatever your role attribute is
            $user->save();

            // Redirect to the landing page (index route) after role update
            return redirect()->route('index')->with('success', 'Your role has been updated to Admin!');
        }

        return redirect()->route('home')->with('error', 'Invalid plan selected!');
    }
}

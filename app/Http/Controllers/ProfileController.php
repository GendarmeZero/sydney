<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Resume;
use App\Models\AdditionalInformation;

class ProfileController extends Controller
{


    /**
     * Display the user's profile form, including resume info.
     */
    public function showProfile(Request $request): View
    {
        // Retrieve the user's additional information and resume (if exists)
        $additionalInfo = AdditionalInformation::where('user_id', $request->user()->id)->first();

        return view('profile.show', [
            'user' => $request->user(),
            'additionalInfo' => $additionalInfo, // Pass additional information
        ]);
    }

    /**
     * Upload resume for the user's profile.
     */
    public function uploadResume(Request $request): RedirectResponse
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'linked_user_id' => 'nullable|exists:users,id', // Validate linked_user_id, ensure it exists in the users table (optional)
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Store the uploaded resume file
        $file = $request->file('resume');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('resumes', $filename, 'public');

        // Create the resume record in the resumes table
        $resume = Resume::create([
            'user_id' => $user->id,
            'filename' => $filePath,
            'original_filename' => $file->getClientOriginalName(),
        ]);

        // Get the linked_user_id from the request (if provided)
        $linkedUserId = $request->input('linked_user_id');

        // Associate the resume with the user's additional information
        $additionalInfo = AdditionalInformation::firstOrNew(['user_id' => $user->id]);
        $additionalInfo->resume_id = $resume->id;
        $additionalInfo->linked_user_id = $linkedUserId; // Store the linked user ID
        $additionalInfo->save();

        // Redirect back to the profile page with a success message
        return back()->with('success', 'Resume uploaded and linked successfully!');
    }
}

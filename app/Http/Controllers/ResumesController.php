<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResumesController extends Controller
{
    public function index()
    {
        $resumes = Resume::with('user')->get();
        return view('resumes.index', compact('resumes'));
    }

    public function create()
    {
        return view('resumes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('resume');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('resumes', $filename, 'public');

        Resume::create([
            'user_id' => Auth::id(),
            'filename' => $filePath,
            'original_filename' => $file->getClientOriginalName(),
        ]);

        return redirect()->route('resumes.index')->with('success', 'Resume uploaded successfully!');
    }

    public function download($id)
    {
        $resume = Resume::findOrFail($id);
        return Storage::disk('public')->download($resume->filename, $resume->original_filename);
    }
}


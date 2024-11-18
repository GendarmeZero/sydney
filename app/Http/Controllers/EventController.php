<?php

namespace App\Http\Controllers;  // Only one namespace declaration needed

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Corrected the use statement

class EventController extends Controller
{
    public function index()
    {
        $users = User::all();
        $events = Event::all();
        return view('dashboard.events.index', compact('events', 'users'));
    }

    public function create()
    {
        // Return the create view
        return view('dashboard.events.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
        ]);

        // Add the authenticated user's user_id to the validated data
        $validated['user_id'] = auth()->id(); // Get the logged-in user's ID

        // Create a new event record
        Event::create($validated);

        // Redirect back to the index page with a success message
        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        // Return the edit view for the specific event
        return view('dashboard.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
        ]);

        // Update the event record
        $event->update($validated);

        // Redirect back to the index page with a success message
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        // Delete the event record
        $event->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }

    public function show(Event $event)
    {
        // Return the view with the specific event
        return view('dashboard.events.show', compact('event'));
    }
}

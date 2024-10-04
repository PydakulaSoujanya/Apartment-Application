<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    // Show the form to create a meeting
    public function create()
    {
        return view('admin.meetings.create');
    }

    // Store the meeting in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'required|string',
            'brief_topic' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'agenda' => 'required|array',
            'attendees' => 'required|string',
            'alert' => 'required|array',
        ]);

        Meeting::create($validated);

        return redirect()->route('admin.meetings.index')->with('success', 'Meeting created successfully.');
    }

    // Show all meetings
    public function index()
    {
        $meetings = Meeting::all();
        return view('admin.meetings.index', compact('meetings'));
    }

    // Show details of a specific meeting
    public function show($id)
    {
        $meeting = Meeting::findOrFail($id);
        return view('admin.meetings.show', compact('meeting'));
    }

    // Show the form to edit a meeting
    public function edit($id)
    {
        $meeting = Meeting::findOrFail($id);
        return view('admin.meetings.edit', compact('meeting'));
    }

    // Update a meeting in the database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'required|string',
            'brief_topic' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'agenda' => 'required|array',
            'attendees' => 'required|string',
            'alert' => 'required|array',
        ]);
       

        $meeting = Meeting::findOrFail($id);
        $meeting->update($validated);

        return redirect()->route('admin.meetings.index')->with('success', 'Meeting updated successfully.');
    }

    // Delete a meeting from the database
    public function destroy($id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->delete();

        return redirect()->route('admin.meetings.index')->with('success', 'Meeting deleted successfully.');
    }
}

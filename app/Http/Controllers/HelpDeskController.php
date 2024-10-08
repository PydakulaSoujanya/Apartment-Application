<?php

namespace App\Http\Controllers;

use App\Models\HelpDeskRequest;
use Illuminate\Http\Request;

class HelpDeskController extends Controller
{
    // Display help desk requests for residents
    public function index()
    {
        $requests = HelpDeskRequest::all();
        return view('resident.helpdesk.index', compact('requests'));
    }

    // Display help desk requests for admins
    public function adminIndex()
    {
        $requests = HelpDeskRequest::all();
        return view('admin.helpdesk.index', compact('requests'));
    }

    // Show the form for creating a new help desk request
    public function create()
    {
        return view('resident.helpdesk.create');
    }

    // Store a new help desk request
    public function store(Request $request)
    {
        $validated = $request->validate([
            'request_title' => 'required|string|max:255',
            'description' => 'required|string',
            'office' => 'nullable|string|max:255',
            'category' => 'required|string',
            'preferred_date' => 'nullable|date',
            'urgent' => 'nullable|boolean',
            'attachments.*' => 'mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('helpdesk'), $filename);
                $attachments[] = $filename;
            }
        }

        HelpDeskRequest::create([
            'request_title' => $validated['request_title'],
            'description' => $validated['description'],
            'office' => $validated['office'],
            'category' => $validated['category'],
            'preferred_date' => $validated['preferred_date'],
            'urgent' => $validated['urgent'] ?? false,
            'attachments' => implode(',', $attachments),
            'status' => 'Not Yet Started', // Default status
        ]);

        return redirect()->back()->with('success', 'Help Desk request submitted successfully!');
    }

    // Show the form for editing a specific help desk request
    public function edit($id)
    {
        $request = HelpDeskRequest::findOrFail($id);
        return view('resident.helpdesk.edit', compact('request'));
    }

    // Update a specific help desk request
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'request_title' => 'required|string|max:255',
            'description' => 'required|string',
            'office' => 'nullable|string|max:255',
            'category' => 'required|string',
            'preferred_date' => 'nullable|date',
            'urgent' => 'nullable|boolean',
            'attachments.*' => 'mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $helpRequest = HelpDeskRequest::findOrFail($id);
        $helpRequest->request_title = $validated['request_title'];
        $helpRequest->description = $validated['description'];
        $helpRequest->office = $validated['office'];
        $helpRequest->category = $validated['category'];
        $helpRequest->preferred_date = $validated['preferred_date'];
        $helpRequest->urgent = $validated['urgent'] ?? false;

        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('helpdesk'), $filename);
                $attachments[] = $filename;
            }
            $helpRequest->attachments = implode(',', $attachments);
        }

        $helpRequest->save();

        return redirect()->route('resident.helpdesk.index')->with('success', 'Help Desk request updated successfully!');
    }

    // Delete a specific help desk request
    public function destroy($id)
    {
        $helpRequest = HelpDeskRequest::findOrFail($id);
        $helpRequest->delete();

        return redirect()->route('resident.helpdesk.index')->with('success', 'Help Desk request deleted successfully!');
    }

    // Update the status of a specific help desk request (Admin Only)
    public function updateStatus($id)
    {
        $helpdeskRequest = HelpDeskRequest::findOrFail($id);
        
        // Toggle between statuses
        if ($helpdeskRequest->status == 'In Progress') {
            $helpdeskRequest->status = 'Completed';
        } else {
            $helpdeskRequest->status = 'In Progress';
        }
        
        $helpdeskRequest->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}

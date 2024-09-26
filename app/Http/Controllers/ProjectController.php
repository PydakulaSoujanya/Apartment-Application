<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Carbon\Carbon; // Add this at the top of your file

class ProjectController extends Controller
{
    // Display the list of projects
    public function index()
    {
        // Retrieve all projects from the database
        $projects = Project::all(); 
        return view('admin.projects.project', compact('projects'));
    }

    // Show the form to create a new project
    public function create()
    {
        // Return the form view for creating a project
        return view('admin.projects.createproject');
    }

    // Store a new project
    public function store(Request $request)
    {
        // Validate and store the project
        $validated = $request->validate([
            'category' => 'required',
            'topic' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'driven_by' => 'required',
            'target_date' => 'required|date',
            'attachment' => 'nullable|file',
            'note' => 'nullable|string',
        ]);

        // Log the validated data
        \Log::info('Validated Data:', $validated); 

        // Handle file upload
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
            $validated['file_path'] = $filePath; // Store file path in the validated array
        }

        // Convert the target_date string to a Carbon instance
        $validated['target_date'] = Carbon::parse($validated['target_date'])->format('Y-m-d'); // Ensure it is in the right format

        // Create the project
        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    // Show the details of a project
   // Show the details of a project
public function show($id)
{
    $project = Project::findOrFail($id);
    // Ensure target_date is a Carbon instance
    $project->target_date = Carbon::parse($project->target_date);
    return view('admin.projects.viewproject', compact('project'));
}

// Show the form to edit a project
public function edit($id)
{
    $project = Project::findOrFail($id);
    // Ensure target_date is a Carbon instance
    $project->target_date = Carbon::parse($project->target_date);
    return view('admin.projects.editproject', compact('project'));
}


    // Update the project
    public function update(Request $request, $id)
    {
        // Validate and update the project
        $validated = $request->validate([
            'category' => 'required',
            'topic' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'driven_by' => 'required',
            'target_date' => 'required|date',
            'attachment' => 'nullable|file',
            'note' => 'nullable|string',
        ]);

        // Log the validated data
        \Log::info('Validated Data for Update:', $validated); 

        // Handle file upload if a new file is provided
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
            $validated['file_path'] = $filePath; // Store new file path in the validated array
        }

        // Convert the target_date string to a Carbon instance
        $validated['target_date'] = Carbon::parse($validated['target_date'])->format('Y-m-d'); // Ensure it is in the right format

        // Find the project and update it
        $project = Project::findOrFail($id);
        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    // Delete the project
    public function destroy($id)
    {
        $project = Project::findOrFail($id); // Find the project
        $project->delete(); // Delete the project

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}

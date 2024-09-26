<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\Category;


class StaffController extends Controller
{
    public function index()
{
    // Fetch staff members ordered by the created_at field in descending order
    $staff = Staff::orderBy('created_at', 'desc')->get();
    
    // Return the view with the staff data
    return view('admin.staff.view-staff', compact('staff'));
}

public function create()
{
    // Fetch all categories
    $categories = Category::all();

    // Pass categories to the view
    return view('admin.staff.create', compact('categories'));
}

public function store(Request $request)
{
    // Validate and save data
    $request->validate([
        'name' => 'required',
        'category' => 'required',
        'gender' => 'required',
        'contact' => 'required',
        'email' => 'required|email',
        'languages' => 'required',
        'doj' => 'required|date',
        'aadhar' => 'required',
        'status' => 'required',
    ]);

    // Store staff data
    Staff::create($request->all());

    // Redirect back with success message
    return redirect()->route('admin.staff.view-staff')->with('success', 'Staff created successfully!');
}

public function show($id)
{
    $staff = Staff::findOrFail($id);
    return view('admin.staff.show', compact('staff'));
}

public function edit($id)
{
    $staff = Staff::findOrFail($id);
    return view('admin.staff.edit', compact('staff'));
}

public function update(Request $request, $id)
{
    // Validate input
    $request->validate([
        'name' => 'required',
        'category' => 'required',
        'gender' => 'required',
        'contact' => 'required',
        'email' => 'required|email',
        'languages' => 'required',
        'doj' => 'required|date',
        'aadhar' => 'required',
        'status' => 'required',
    ]);

    // Find the staff member and update their details
    $staff = Staff::findOrFail($id);
    $staff->update($request->all());

    // Redirect back with success message
    return redirect()->route('admin.staff.view-staff')->with('success', 'Staff updated successfully!');
}

public function destroy($id)
{
    $staffMember = Staff::findOrFail($id);
    $staffMember->delete();

    return redirect()->route('admin.staff.view-staff')->with('success', 'Staff member deleted successfully');
}

}

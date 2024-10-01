<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\SecondaryUser;
use Illuminate\Support\Facades\Auth;

class SecondaryuserController extends Controller
{
    // Show the registration form for a secondary user
    public function showRegistersecondaryuserForm()
    {
        return view('admin.secondaryAdmin.create');
    }

    // Register a new secondary user
    public function registersecondaryuser(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',  // Mobile number validation (max length of 15)
            'email' => 'required|string|email|max:255|unique:users', // Email must be unique in the users table
            'password' => 'required|string|confirmed|min:8', // Password confirmation and min length
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'aadhar_no' => 'required|string|max:12', // Aadhar number typically 12 digits
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user (assuming '4' is for Watchman role)
        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 1,
        ]);

        // Create the secondary user (Watchman) record
        SecondaryUser::create([
            'user_id' => $user->id,
            'admin_id' => Auth::id(), // Current admin ID
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'aadhar_no' => $request->aadhar_no,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.secondaryuser-list')->with('status', 'SecondaryUser registered successfully.');
    }

    // Show the list of secondary users (Watchmen)
    public function showsecondaryuserList()
    {
        // Fetch all secondary users with related user information
        $secondaryusers = SecondaryUser::with('user')->get();

        // Return the view with the data
        return view('admin.secondaryAdmin.index', compact('secondaryusers'));
    }

    // View details of a specific secondary user
    public function viewsecondaryuser($id)
    {
        // Fetch secondary user by ID, including related user details
        $secondaryuser = SecondaryUser::with('user')->findOrFail($id);
        return view('admin.secondaryAdmin.view', compact('secondaryuser'));
    }

    // Show edit form for a specific secondary user
    public function editsecondaryuser($id)
    {
        $secondaryuser = SecondaryUser::findOrFail($id);
        return view('admin.secondaryAdmin.edit', compact('secondaryuser'));
    }

    // Update secondary user details
    public function updatesecondaryuser(Request $request, $id)
    {
        $secondaryuser = SecondaryUser::findOrFail($id);

        // Validation rules for updating
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email,' . $secondaryuser->user_id, // Ignore current user's email
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'aadhar_no' => 'required|string|max:12',
            'address' => 'required|string|max:255',
        ]);

        // Update secondary user details
        $secondaryuser->update($request->all());

        // Update the associated user record
        $secondaryuser->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.secondaryuser-list')->with('status', 'SecondaryUser updated successfully.');
    }

    // Delete a secondary user (and associated user record)
    public function deletesecondaryuser($id)
    {
        $secondaryuser = SecondaryUser::findOrFail($id);

        // Delete the associated user and secondary user record
        $secondaryuser->user->delete();  // Deletes the user record
        $secondaryuser->delete();        // Deletes the secondary user details

        return redirect()->route('admin.secondaryuser-list')->with('status', 'SecondaryUser deleted successfully.');
    }
}

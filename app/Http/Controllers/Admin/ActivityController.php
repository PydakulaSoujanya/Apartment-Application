<?php

namespace App\Http\Controllers\Admin; // Correct namespace to Admin

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Ensure this is imported

class ActivityController extends Controller
{
    // Method to show the form to create a new activity
    public function create()
    {
        return view('admin.activities.new-activity'); // Adjust the view path if necessary
    }

    // Method to display the list of activities (static data)
    public function index()
    {
        // Static data for activities
        $activities = [
            [
                'id' => 1,
                'activity_name' => 'Yoga Class',
                'description' => 'Morning yoga session',
                'activity_date' => '2024-09-15',
                'charge_per_participant' => 200,
                'max_participants' => 20
            ],
            [
                'id' => 2,
                'activity_name' => 'Swimming Competition',
                'description' => 'Annual swimming race',
                'activity_date' => '2024-10-10',
                'charge_per_participant' => 500,
                'max_participants' => 50
            ],
            [
                'id' => 3,
                'activity_name' => 'Cooking Workshop',
                'description' => 'Basic cooking lessons',
                'activity_date' => '2024-11-01',
                'charge_per_participant' => 100,
                'max_participants' => 30
            ],
        ];

        // Pass the static data to the view
        return view('admin.activities.index', compact('activities'));
    }

    // Method to store the new activity
    public function store(Request $request)
    {
        // Validate and store the activity
        $validated = $request->validate([
            'activity_name' => 'required|string|max:255',
            'description' => 'required|string',
            'activity_date' => 'required|date',
            'charge_per_participant' => 'required|numeric',
            'max_participants' => 'required|integer',
        ]);

        // Normally, you would store the activity in the database, but this is static data, so you can skip storing.

        // Redirect back with success message
        return redirect()->route('admin.activities.create')->with('success', 'Activity added successfully!');
    }
}

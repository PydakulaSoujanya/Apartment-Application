<?php

namespace App\Http\Controllers\Admin; // Correct namespace for Admin

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Ensure the base Controller is imported

class FacilityController extends Controller
{
    // Display the list of facilities (mock data)
    public function index()
    {
        $facilities = [
            ['id' => 1, 'facility_name' => 'Swimming Pool', 'charge_per_hour' => 150, 'charge_per_day' => 1200, 'cancel_days' => 2],
            ['id' => 2, 'facility_name' => 'Clubhouse', 'charge_per_hour' => 100, 'charge_per_day' => 800, 'cancel_days' => 3],
            ['id' => 3, 'facility_name' => 'Gym', 'charge_per_hour' => 200, 'charge_per_day' => 1600, 'cancel_days' => 1],
        ];

        return view('admin.facilities.view-facilities', compact('facilities'));
    }

    // Show the form for creating a new facility
    public function create()
    {
        return view('admin.facilities.new-facility');
    }

    // Handle the form submission (mock behavior)
    public function store(Request $request)
    {
        // Mock validation (you can keep the validation logic if needed)
        $request->validate([
            'facility_name' => 'required|string|max:255',
            'charge_per_hour' => 'required|numeric',
            'charge_per_day' => 'required|numeric',
            'cancel_days' => 'required|integer',
        ]);

        // Instead of saving to the database, you can simply redirect back with a success message
        return redirect()->route('admin.facilities.create')->with('success', 'Facility added successfully (mock data, no DB)');
    }
}

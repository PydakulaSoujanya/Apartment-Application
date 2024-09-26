<?php

namespace App\Http\Controllers;

use App\Models\Vehicle; // Ensure you import the Vehicle model
use Illuminate\Http\Request;

class ParkingSlotController extends Controller
{
    // Display the list of parking slots/vehicles
    public function index()
    {
        // Fetch all vehicles and pass them to the index view
        $vehicles = Vehicle::all();
        return view('admin.parking-slot.index', compact('vehicles'));
    }

    // Show the form for adding a vehicle
    public function showVehicleForm()
    {
        return view('admin.parking-slot.vehicle-form');
    }

    // Store vehicle data into the database
public function storeVehicle(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'slotNo' => 'required|integer',
        'slotName' => 'required|string|max:255',
        'slotType' => 'required|string|max:255',
        'block' => 'required|string|max:255',
        'unitNo' => 'required|integer',
        'status' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'vehicleNo' => 'required|string|max:255',
        'vehicleType' => 'required|string|max:255',
        'rfidNo' => 'nullable|string|max:255',
        'fromDate' => 'required|date',
        'toDate' => 'nullable|date',
        'additionalField' => 'nullable|string|max:255',
    ]);

    // Attempt to store the validated data
    try {
        Vehicle::create($validatedData);
        return redirect()->route('admin.parking-slot.index')
                         ->with('success', 'Vehicle added successfully!');
    } catch (\Exception $e) {
        // Log the error and redirect with an error message
        \Log::error('Error storing vehicle: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to add vehicle. Please try again.');
    }
}


}

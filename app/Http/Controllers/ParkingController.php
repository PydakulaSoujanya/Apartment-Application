<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the Log facade

class ParkingController extends Controller
{
    public function index()
    {
        $parking = Parking::all(); // Assuming you're fetching all parking data
        return view('admin.parking.index', compact('parking'));
    }

    public function create()
    {
        return view('admin.parking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slot_no' => 'required',
            'slot_name' => 'required',
            'slot_type' => 'required',
            'block' => 'required',
            'unit_no' => 'required',
            'status' => 'required',
            'name' => 'required',
            'vehicle_no' => 'required',
            'vehicle_type' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        Log::info('Storing parking data', $request->all()); // Log the incoming data

        Parking::create($request->all());

        Log::info('Parking data stored successfully'); // Log success

        return redirect()->route('parking.index')->with('success', 'Parking information added successfully.');
    }
    public function edit(Parking $parking)
    {
        return view('admin.parking.edit', compact('parking'));
    }
    public function update(Request $request, Parking $parking)
    {
        // Validate the request
        $request->validate([
            'slot_no' => 'required|string|max:255',
            'slot_name' => 'required|string|max:255',
            'slot_type' => 'required|string|max:255',
            'block' => 'required|string|max:255',
            'unit_no' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'vehicle_no' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'rfid_no' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'additional_info' => 'nullable|string|max:1000',
        ]);

        // Update the parking record
        $parking->update($request->all());

        return redirect()->route('parking.index')->with('success', 'Parking information updated successfully.');
    }

    public function show(Parking $parking)
    {
        return view('admin.parking.show', compact('parking'));
    }

    public function destroy(Parking $parking)
    {
        $parking->delete();
        return redirect()->route('parking.index')->with('success', 'Parking information deleted successfully.');
    }
}

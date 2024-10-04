<?php

namespace App\Http\Controllers;

use App\Models\ParkingSlot;
use Illuminate\Http\Request;

class ParkingSlotController extends Controller
{
    public function index()
    {
        $slots = ParkingSlot::all();
        return view('admin.parking_slot.index', compact('slots'));
    }

    public function create()
    {
        return view('admin.parking_slot.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slot_no' => 'required',
            'type' => 'required',
            'block' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        ParkingSlot::create($request->all());

        return redirect()->route('admin.parking_slot.index')->with('success', 'Parking Slot added successfully.');
    }

    public function edit(ParkingSlot $parkingSlot)
    {
        return view('admin.parking_slot.edit', compact('parkingSlot'));
    }

    public function update(Request $request, ParkingSlot $parkingSlot)
    {
        $request->validate([
            'slot_no' => 'required',
            'type' => 'required',
            'block' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $parkingSlot->update($request->all());

        return redirect()->route('admin.parking_slot.index')->with('success', 'Parking Slot updated successfully.');
    }

    public function destroy(ParkingSlot $parkingSlot)
    {
        $parkingSlot->delete();

        return redirect()->route('admin.parking_slot.index')->with('success', 'Parking Slot deleted successfully.');
    }
}

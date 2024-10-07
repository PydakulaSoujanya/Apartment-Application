<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\ResidentDetail;

class WatchmanVisitorController extends Controller
{
    // Method to show the visitor creation form
    public function create(Request $request)
{
    $residentName = null;

    // Check if flat number is provided in the request
    if ($request->has('flat_number')) {
        $flatNumber = $request->input('flat_number');
        $resident = ResidentDetail::where('flat_number', $flatNumber)->first();

        // Set the resident name if found
        if ($resident) {
            $residentName = $resident->name;
        }
    }

    // Fetch flat numbers for the dropdown
    $flatNumbers = ResidentDetail::pluck('flat_number')->unique();

    return view('watchman.visitors.create', compact('flatNumbers', 'residentName'));
}

public function getResidentDetails(Request $request)
{
    $flatNumber = $request->input('flat_number');
    $resident = ResidentDetail::where('flat_number', $flatNumber)->first();

    if ($resident) {
        return response()->json([
            'name' => $resident->name,  // Fetches resident name
            'mobile' => $resident->mobile,  // Fetches resident mobile
        ]);
    }

    return response()->json(['error' => 'Resident not found'], 404);
}




    // Method to store the newly created visitor
    public function store(Request $request)
{
    // Validate the input data
    $request->validate([
        'flat_number' => 'required',
        'resident_name' => 'required|string|max:255',
        'visitor_name' => 'required|string|max:255',
        'visitor_email' => 'nullable|email',
        'visitor_number' => 'required|string|max:15',
        'visiting_date' => 'required|date',
        'visiting_reason' => 'required|string',
    ]);

    // Get the resident's user ID based on the flat number
    $resident = ResidentDetail::where('flat_number', $request->flat_number)->first();

    // Create a new visitor record
    Visitor::create([
        'flat_number' => $request->flat_number,
        'resident_name' => $request->resident_name,
        'visitor_name' => $request->visitor_name,
        'visitor_email' => $request->visitor_email,
        'visitor_number' => $request->visitor_number,
        'visiting_date' => $request->visiting_date,
        'visiting_reason' => $request->visiting_reason,
        'checkin_time' => null,
        'checkout_time' => null,
        'user_id' => $resident->user_id ?? null, // Store user_id if resident found
    ]);

    // Redirect back to the visitor index page with a success message
    return redirect()->route('watchman.visitors.index')->with('success', 'Visitor created successfully.');
}


    // Fetch all visitors and display them
    public function index()
    {
        // Fetch all visitors and order them by visiting_date and start_time
        $visitors = Visitor::orderBy('visiting_date', 'desc')->get();

        // Pass the data to the view
        return view('watchman.visitors.index', compact('visitors'));
    }

    // Method to check in the visitor
    // public function checkin($id)
    // {
    //     $visitor = Visitor::findOrFail($id);
    //     if (is_null($visitor->checkin_time)) {
    //         $visitor->checkin_time = now();
    //         $visitor->save();
    //         return redirect()->back()->with('success', 'Visitor checked in successfully.');
    //     } else {
    //         return redirect()->back()->with('error', 'Visitor has already checked in.');
    //     }
    // }
    public function checkin($id)
{
    // Find the visitor by ID or fail if it doesn't exist
    $visitor = Visitor::findOrFail($id);

    // Ensure the visitor hasn't already checked in
    if (is_null($visitor->checkin_time)) {
        // Use Carbon to get the current time
        $visitor->checkin_time = \Carbon\Carbon::now(); // This gets the current time in the configured timezone
        $visitor->save();

        return redirect()->back()->with('success', 'Visitor checked in at ' . $visitor->checkin_time->format('h:i A') . ' successfully.');
    } else {
        return redirect()->back()->with('error', 'Visitor has already checked in.');
    }
}



    // Method to check out the visitor
    public function checkout($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->checkout_time = now();
        $visitor->save();

        return redirect()->back()->with('success', 'Visitor checked out successfully.');
    }

  
}

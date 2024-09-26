<?php

namespace App\Http\Controllers;

use App\Models\Facilities; // Adjusted to plural 'Facilities'
use App\Models\FacilityBooking; // Assuming you have a model for the facilities_booking table
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    // Show the list of facilities (admin view)
    public function index()
    {
        $facilities = Facilities::all(); // Fetch all records from the 'facilities' table
        return view('admin.facilities.view-facilities', compact('facilities'));
    }

    // Show the booking history (resident view)
    // public function bookingHistory()
    // {
    //     return view('resident.facilities.booking-history');
    // }

    // Show the facility creation form (admin view)
  // Show the facility creation form (admin view)
public function create()
{
    $facilities = Facilities::all(); // Fetch all facilities
    return view('admin.facilities.create', compact('facilities')); // Pass facilities to the view
}


    // Handle the form submission and insert facility data (admin view)
    public function store(Request $request)
    {
        // Validation for form inputs (admin facility creation)
        $request->validate([
            'facility_name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'charge_per_day' => 'required|numeric',
            'cancel_days' => 'required|numeric',
        ]);

        // Create a new facility record in the database
        Facilities::create([
            'facility_name' => $request->facility_name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'charge_per_day' => $request->charge_per_day,
            'cancel_days' => $request->cancel_days,
        ]);

        // Redirect back to the facilities list with a success message
        return redirect()->route('admin.facilities.index')->with('success', 'Facility added successfully');
    }

    // Show the facility edit form (admin view)
    public function edit($id)
    {
        $facility = Facilities::findOrFail($id); // Fetch the facility by its ID
        return view('admin.facilities.edit', compact('facility'));
    }

    // Handle the facility update (admin view)
    public function update(Request $request, $id)
    {
        // Validation for form inputs (admin facility update)
        $request->validate([
            'facility_name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'charge_per_day' => 'required|numeric',
            'cancel_days' => 'required|numeric',
        ]);

        // Find the facility by ID and update it
        $facility = Facilities::findOrFail($id);
        $facility->update([
            'facility_name' => $request->facility_name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'charge_per_day' => $request->charge_per_day,
            'cancel_days' => $request->cancel_days,
        ]);

        // Redirect back to the facilities list with a success message
        return redirect()->route('admin.facilities.index')->with('success', 'Facility updated successfully');
    }

    // Handle the facility deletion (admin view)
    public function destroy($id)
    {
        // Find the facility by ID and delete it
        $facility = Facilities::findOrFail($id);
        $facility->delete();

        // Redirect back to the facilities list with a success message
        return redirect()->route('admin.facilities.index')->with('success', 'Facility deleted successfully');
    }

    // Show the resident booking form (resident view)
    public function showBookingForm()
    {
        // Fetch facilities from the database
        $facilities = Facilities::all(); // Use the correct model name
        return view('facilities.index', compact('facilities'));
    }

    // Handle facility booking submission (resident view)
    public function bookFacility(Request $request)
    {
        // Validate the form data
        $request->validate([
            'facility' => 'required|exists:facilities,id', // assuming facilities table exists
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'bookedFor' => 'required',
            'communityPurpose' => 'required',
        ]);

        // Store the form data in the facilities_booking table
        $booking = new FacilityBooking();
        $booking->facility_id = $request->facility;
        $booking->date = $request->date;
        $booking->start_time = $request->start_time;
        $booking->end_time = $request->end_time;
        $booking->booked_for = $request->bookedFor;
        $booking->community_purpose = $request->communityPurpose === 'Yes' ? true : false;
        $booking->user_id = auth()->user()->id; // Assuming the user is logged in

        // Save the booking
        $booking->save();

        // Redirect to the booking history with a success message
        return redirect()->route('resident.facilities.booking-history')->with('success', 'Facility booking was successful!');
    }

    // Show the list of facilities for residents (resident view)
    public function residentIndex()
    {
        $facilities = Facilities::all(); // Fetch all records from the 'facilities' table
        return view('resident.facilities.index', compact('facilities')); // Pass the facilities to the view
    }

    // Get facility start and end times (resident view)
    public function getFacilityTimes($id)
    {
        // Fetch the facility from the database by its ID
        $facility = Facilities::findOrFail($id);

        // Return the start and end time as a JSON response
        return response()->json([
            'start_time' => $facility->start_time,
            'end_time' => $facility->end_time
        ]);
    }

    public function bookingHistory()
    {
        // Join the facilities table with facilities_booking to get the facility_name
        $bookings = FacilityBooking::select('facilities_booking.*', 'facilities.facility_name')
            ->join('facilities', 'facilities.id', '=', 'facilities_booking.facility_id')
            ->where('facilities_booking.user_id', auth()->user()->id)
            ->get();
    
        // Pass the bookings to the view
        return view('resident.facilities.booking-history', compact('bookings'));
    }
}
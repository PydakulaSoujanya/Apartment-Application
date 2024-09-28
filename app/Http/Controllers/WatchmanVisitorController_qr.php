<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class WatchmanVisitorController extends Controller
{
    public function index()
    {
        // Fetch all visitors and order them by visiting_date and start_time
        $visitors = Visitor::orderBy('visiting_date', 'desc')
                           ->orderBy('start_time', 'desc')
                           ->get();
        
        // Pass the data to the view
        return view('watchman.visitors.index', compact('visitors'));
    }

    // public function checkin($id)
    // {
    //     $visitor = Visitor::findOrFail($id);
    //     $visitor->checkin_time = now(); // Capture current date and time
    //     $visitor->save();

    //     return redirect()->back()->with('success', 'Visitor checked in successfully.');
    // }

    public function checkin(Request $request, $id)
{
    // Validate the QR code data (if necessary)
    $qrCodeData = $request->input('qr_code_data');

    // Find the visitor and validate the QR code (optional)
    $visitor = Visitor::findOrFail($id);
    
    // You can add a condition here to match the QR code with visitor information if needed
    // Example:
    // if ($visitor->expected_qr_code_data !== $qrCodeData) {
    //     return response()->json(['error' => 'QR code mismatch'], 400);
    // }

    // Update the check-in time
    $visitor->checkin_time = now();
    $visitor->save();

    return response()->json(['success' => 'Visitor checked in successfully.']);
}


    public function checkout($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->checkout_time = now(); // Capture current date and time
        $visitor->save();

        return redirect()->back()->with('success', 'Visitor checked out successfully.');
    }
}
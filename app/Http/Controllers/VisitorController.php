<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\ResidentDetail;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use App\Mail\VisitorCreatedMail;
use Illuminate\Support\Facades\Mail;

class VisitorController extends Controller
{
    public function create()
{
    $resident_name = Auth::user()->name; // User's name from the authenticated user
    $flat_number = ResidentDetail::where('user_id', Auth::id())->value('flat_number'); // Fetch flat number from ResidentDetail

    return view('resident.visitors.create', compact('resident_name', 'flat_number'));
}



public function store(Request $request)
{
    // Validate and create the visitor record as before
    $validatedData = $request->validate([
        'visitor_name' => 'required|string|max:255',
        'visitor_number' => 'required|string|max:255',
        'visitor_email' => 'required|email|max:255',
        'visiting_reason' => 'required|string',
        'visiting_date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
        'flat_number' => 'required|string|max:255',
        'resident_name' => 'required|string|max:255',
    ]);

    $visitor = Visitor::create([
        'user_id' => Auth::id(),
        'visitor_name' => $validatedData['visitor_name'],
        'visitor_number' => $validatedData['visitor_number'],
        'visitor_email' => $validatedData['visitor_email'],
        'visiting_reason' => $validatedData['visiting_reason'],
        'visiting_date' => $validatedData['visiting_date'],
        'start_time' => $validatedData['start_time'],
        'end_time' => $validatedData['end_time'],
        'flat_number' => $validatedData['flat_number'],
        'resident_name' => $validatedData['resident_name'],
    ]);

    // Generate and save the QR Code as before
    $qrData = 'Visitor Name: ' . $visitor->visitor_name . "\n" .
              'Phone Number: ' . $visitor->visitor_number . "\n" .
              'Visiting Date: ' . $visitor->visiting_date . "\n" .
              'Start Time: ' . $visitor->start_time . "\n" .
              'End Time: ' . $visitor->end_time;

    $qrCodeFilename = 'visitor_' . $visitor->id . '.png';
$result = Builder::create()
    ->writer(new PngWriter())
    ->data($qrData)
    ->size(300)
    ->margin(10)
    ->build();

$result->saveToFile(public_path('visitor_qrcode/' . $qrCodeFilename));

$visitor->update(['qr_code_filename' => $qrCodeFilename]);


    // Send the email
    Mail::to($visitor->visitor_email)->send(new VisitorCreatedMail($visitor));

    return redirect()->route('resident.visitors.index')->with('success', 'Visitor created successfully.');
}

    public function index()
    {
        $visitors = Visitor::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('resident.visitors.index', compact('visitors'));
    }

    public function edit($id)
    {
        $visitor = Visitor::where('user_id', Auth::id())->findOrFail($id);
        return view('resident.visitors.edit', compact('visitor'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'visitor_name' => 'required|string|max:255',
            'visitor_number' => 'required|string|max:255',
            'visiting_reason' => 'required|string',
            'visiting_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'flat_number' => 'required|string|max:255',
            'resident_name' => 'required|string|max:255',
        ]);

        $visitor = Visitor::where('user_id', Auth::id())->findOrFail($id);
        $visitor->update($validatedData);

        return redirect()->route('resident.visitors.index')->with('success', 'Visitor updated successfully.');
    }

    public function destroy($id)
    {
        $visitor = Visitor::where('user_id', Auth::id())->findOrFail($id);
        $visitor->delete();

        return redirect()->route('resident.visitors.index')->with('success', 'Visitor deleted successfully.');
    }

    public function show($id)
    {
        $visitor = Visitor::where('user_id', Auth::id())->findOrFail($id);
        return view('resident.visitors.show', compact('visitor'));
    }

    public function approve($id)
{
    $visitor = Visitor::where('user_id', Auth::id())->findOrFail($id);
    
    // Only allow the resident to approve if the current status is pending
    if ($visitor->status === 'pending') {
        $visitor->status = 'approved';
        $visitor->save();

        return redirect()->route('resident.visitors.index')->with('success', 'Visitor has been approved.');
    }

    return redirect()->route('resident.visitors.index')->with('error', 'Visitor cannot be approved.');
}

public function reject($id)
{
    $visitor = Visitor::where('user_id', Auth::id())->findOrFail($id);
    
    // Only allow the resident to reject if the current status is pending
    if ($visitor->status === 'pending') {
        $visitor->status = 'rejected';
        $visitor->save();

        return redirect()->route('resident.visitors.index')->with('success', 'Visitor has been rejected.');
    }

    return redirect()->route('resident.visitors.index')->with('error', 'Visitor cannot be rejected.');
}

    
}


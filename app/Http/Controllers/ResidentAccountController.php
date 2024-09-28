<?php

namespace App\Http\Controllers;

use App\Models\ResidentAccount;
use App\Models\ResidentDetail;
use App\Models\MaintenanceCharge; 
use App\Models\Payment;// Import the ResidentDetail model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResidentAccountController extends Controller
{
    // Display all resident details in a table
    public function index()
    {
        $residents = ResidentDetail::all(); // Fetch all residents

        // Get the latest maintenance charge
        $latestCharge = MaintenanceCharge::latest()->first(); // Fetch the latest maintenance charge

        return view('admin.resident_accounts.index', compact('residents', 'latestCharge')); // Pass residents and maintenance charge to the view
    }
    // Show form for editing a resident
    public function edit($id)
    {
        $resident = ResidentDetail::find($id); // Fetch resident by ID

        if (!$resident) {
            return redirect()->route('admin.resident.index')->with('error', 'Resident not found.');
        }

        return view('admin.resident_accounts.edit', compact('resident'));
    }

    // Update resident details
    public function update(Request $request, $id)
    {
        $resident = ResidentDetail::find($id);

        if (!$resident) {
            return redirect()->route('admin.resident.index')->with('error', 'Resident not found.');
        }

        $request->validate([
            'flat_number' => 'required|string',
            'floor' => 'required|integer',
            'block' => 'required|string',
            'flat_holder_name' => 'required|string',
            'name' => 'required|string',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'area' => 'required|numeric',
        ]);

        $resident->update($request->all());

        return redirect()->route('admin.resident.index')->with('success', 'Resident details updated successfully.');
    }

    // Delete resident
    public function destroy($id)
    {
        $resident = ResidentDetail::find($id);

        if (!$resident) {
            return redirect()->route('admin.resident.index')->with('error', 'Resident not found.');
        }

        $resident->delete();

        return redirect()->route('admin.resident.index')->with('success', 'Resident deleted successfully.');
    }

    public function showResidentHome()
    {
        // Fetch the resident's details based on the currently authenticated user
        $resident = ResidentDetail::where('user_id', Auth::id())->first();
    
        // If no resident found, redirect back with an error
        if (!$resident) {
            return redirect()->back()->with('error', 'Resident not found.');
        }
    
        // Fetch the latest maintenance charge
        $latestCharge = MaintenanceCharge::latest()->first();
    
        // If no maintenance charge is found, redirect back with an error
        if (!$latestCharge) {
            return redirect()->back()->with('error', 'Maintenance charge not found.');
        }
    
        // Calculate the amount due based on the resident's area and the latest charge rate
        $area = $resident->area;
        $amountPerSqFt = $latestCharge->amount_per_sqt;
    
        // If the resident's status is 'paid', set the total amount due to 0, otherwise calculate it
        $totalAmountDue = ($resident->status == 'paid') ? 0 : $area * $amountPerSqFt;
    
        // Pass the calculated total amount due and the resident details to the view
        return view('resident.residentHome', [
            'totalAmountDue' => $totalAmountDue,
            'resident' => $resident,
        ]);
    }
    
    
    
    
   
    public function showResidentPaymentForm()
{
    // Get the resident details for the authenticated user
    $resident = ResidentDetail::where('user_id', Auth::id())->first();

    if (!$resident) {
        return redirect()->back()->with('error', 'Resident not found.');
    }

    // Get the latest maintenance charge
    $latestCharge = MaintenanceCharge::latest()->first();

    if (!$latestCharge) {
        return redirect()->back()->with('error', 'Maintenance charge not found.');
    }

    // Calculate total amount due based on the resident's area and the latest charge per sq. ft.
    $area = $resident->area;
    $amountPerSqFt = $latestCharge->amount_per_sqt;
    $totalAmountDue = $area * $amountPerSqFt;

    // Return the view with the resident's details and total amount due
    return view('resident.maintenance.payment', [
        'residentDetails' => $resident,
        'totalAmountDue' => $totalAmountDue,
    ]);
}


public function paymentstate()
{
    // Get the resident details for the authenticated user
    $resident = ResidentDetail::where('user_id', Auth::id())->first();

    if (!$resident) {
        return redirect()->back()->with('error', 'Resident not found.');
    }

    // Get the latest maintenance charge
    $latestCharge = MaintenanceCharge::latest()->first();

    if (!$latestCharge) {
        return redirect()->back()->with('error', 'Maintenance charge not found.');
    }

    // Calculate total amount due based on the resident's area and the latest charge per sq. ft.
    $area = $resident->area;
    $amountPerSqFt = $latestCharge->amount_per_sqt;
    $totalAmountDue = $area * $amountPerSqFt;

    // Return the view with the resident's details and total amount due
    return view('resident.maintenance.payment', [
        'residentDetails' => $resident,
        'totalAmountDue' => $totalAmountDue,  // Pass the variable here
    ]);
}



    public function payment($id)
{
    $resident = ResidentDetail::find($id);

    if (!$resident) {
        return redirect()->back()->with('error', 'Resident not found.');
    }

    $latestCharge = MaintenanceCharge::latest()->first();

    if (!$latestCharge) {
        return redirect()->back()->with('error', 'Maintenance charge not found.');
    }

    // Calculate total amount due based on area and latest maintenance charge
    $area = $resident->area;
    $amountPerSqFt = $latestCharge->amount_per_sqt;
    $totalAmountDue = $area * $amountPerSqFt;

    return view('resident.maintenance.payment', [
        'residentDetails' => $resident,
        'totalAmountDue' => $totalAmountDue,
    ]);
}
public function storePayment(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'amount' => 'required|numeric',
        'payment_date' => 'required|date',
        'mode_of_payment' => 'required|string',
    ]);

    // Find the authenticated resident
    $resident = ResidentDetail::where('user_id', Auth::id())->first();

    if (!$resident) {
        return redirect()->back()->with('error', 'Resident not found.');
    }

    // Get the latest maintenance charge
    $latestCharge = MaintenanceCharge::latest()->first();

    if (!$latestCharge) {
        return redirect()->back()->with('error', 'Maintenance charge not found.');
    }

    // Calculate the total amount due
    $area = $resident->area;
    $amountPerSqFt = $latestCharge->amount_per_sqt;
    $totalAmountDue = $area * $amountPerSqFt;

    // Check if the paid amount matches the total amount due
    if ($request->amount != $totalAmountDue) {
        return redirect()->back()->with('error', 'The amount paid does not match the total amount due.');
    }

    // Update the resident payment status to "paid" in the resident_details table
    $resident->update([
        'status' => 'paid',
    ]);

    // Redirect back with a success message
    return redirect()->route('resident.home')->with('success', 'Payment successful and status updated.');
}




















    


    

   
}
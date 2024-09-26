<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenancePayment;
use App\Models\ResidentDetail;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    // Show the payment form
    public function showPaymentForm()
    {
        $user = auth()->user();

        // Fetch the resident details for the logged-in user
        $residentDetails = ResidentDetail::where('user_id', $user->id)->first();

        // Calculate the maintenance fee based on area (3 Rs per unit of area)
        $maintenance_fee = $residentDetails ? $residentDetails->area * 3 : 0;

        // Return the view with user and maintenance fee data
        return view('resident.maintenance.payment', compact('user', 'maintenance_fee', 'residentDetails'));
    }

    // Process the payment
    public function processPayment(Request $request)
    {
        // Validate the payment amount
        $request->validate([
            'paymentAmount' => 'required|numeric|min:0',
        ]);

        // Create a new record in the maintenance_payments table
        MaintenancePayment::create([
            'user_id' => auth()->id(),
            'amount' => $request->paymentAmount,
            'payment_date' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->route('maintenance.paymentForm')->with('success', 'Payment successful!');
    }

    // Show the maintenance fee
    public function showMaintenanceFee()
{
    $user_id = Auth::id();
    
    // Fetch the resident's details
    $residentDetails = ResidentDetail::where('user_id', $user_id)->first();

    // Debugging output
    if (!$residentDetails) {
        // No resident details found
        return view('resident.maintenance.payment', [
            'user' => auth()->user(),
            'maintenance_fee' => 0,
            'residentDetails' => null
        ])->with('error', 'Resident details not found.');
    }

    // Area should be set
    $area = $residentDetails->area;
    if (!$area) {
        // Area value is null or zero
        return view('resident.maintenance.payment', [
            'user' => auth()->user(),
            'maintenance_fee' => 0,
            'residentDetails' => $residentDetails
        ])->with('error', 'Area not set.');
    }

    // Calculate maintenance fee
    $maintenance_fee = $area * 3;

    return view('resident.maintenance.payment', [
        'user' => auth()->user(),
        'maintenance_fee' => $maintenance_fee,
        'residentDetails' => $residentDetails
    ]);
}

}

<?php
namespace App\Http\Controllers;

use App\Models\MaintenanceCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceChargeController extends Controller
{
    public function index()
    {
        $charges = MaintenanceCharge::all();
        return view('admin.maintenance.index', compact('charges'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount_per_sqt' => 'required|numeric',
        ]);

        MaintenanceCharge::create([
            'amount_per_sqt' => $request->amount_per_sqt,
            'admin_id' => Auth::id(), // Assuming the admin is logged in
        ]);

        return redirect()->back()->with('success', 'Maintenance Charge Created Successfully');
    }

    public function update(Request $request, MaintenanceCharge $maintenanceCharge)
    {
        $request->validate([
            'amount_per_sqt' => 'required|numeric',
        ]);

        $maintenanceCharge->update($request->only('amount_per_sqt'));

        return redirect()->back()->with('success', 'Maintenance Charge Updated Successfully');
    }

    public function destroy(MaintenanceCharge $maintenanceCharge)
    {
        $maintenanceCharge->delete();
        return redirect()->back()->with('success', 'Maintenance Charge Deleted Successfully');
    }
}


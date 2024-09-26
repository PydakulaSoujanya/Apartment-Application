<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
{
    $vendors = Vendor::all(); // Retrieve all vendors from the database
    return view('admin.vendors.view-vendors', compact('vendors')); // Pass the variable to the view
}


    public function create()
    {
        return view('admin.vendors.create');
    }

    

    public function edit(Vendor $vendor)
    {
        return view('admin.vendors.edit', compact('vendor'));
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'vendor_id' => 'required|unique:vendors,vendor_id',
        'vendor_name' => 'required',
        // other validation rules
    ]);

    // Store vendor data into the vendors table
    Vendor::create([
        'vendor_id' => $request->vendor_id,
        'vendor_name' => $request->vendor_name,
        'vendor_contact_name' => $request->vendor_contact_name,
        'vendor_phone' => $request->vendor_phone,
        'vendor_email' => $request->vendor_email,
        'account_head' => $request->account_head,
        'notes' => $request->notes,
        'is_active' => $request->has('is_active') ? 1 : 0,
        'tds_rate' => $request->tds_rate,
        'gstin' => $request->gstin,
        'igst' => $request->igst,
        'cgst' => $request->cgst,
        'sgst' => $request->sgst,
        'pan_no' => $request->pan_no,
        'tds_section_code' => $request->tds_section_code,
        'vendor_legal_type' => $request->vendor_legal_type,
        'payee_name' => $request->payee_name,
        'billing_address' => $request->billing_address,
        'bank_account_no' => $request->bank_account_no,
        'bank_name_branch' => $request->bank_name_branch,
        'bank_ifsc_code' => $request->bank_ifsc_code,
        // Add file uploads if necessary
    ]);

    // Redirect after storing with a success message
    return redirect()->route('admin.vendors.view-vendors')->with('success', 'Vendor added successfully.');
}

public function update(Request $request, Vendor $vendor)
{
    $request->validate([
        'vendor_name' => 'required|string|max:255',
        'vendor_contact_name' => 'nullable|string|max:255',
        'vendor_phone' => 'nullable|string|max:255',
        'vendor_email' => 'nullable|email|max:255',
        'tds_rate' => 'nullable|numeric',
        'gstin' => 'nullable|string|max:255',
        'igst' => 'nullable|numeric',
        'cgst' => 'nullable|numeric',
        'sgst' => 'nullable|numeric',
        'notes' => 'nullable|string',
    ]);

    $vendor->update([
        'vendor_name' => $request->vendor_name,
        'vendor_contact_name' => $request->vendor_contact_name,
        'vendor_phone' => $request->vendor_phone,
        'vendor_email' => $request->vendor_email,
        'tds_rate' => $request->tds_rate,
        'gstin' => $request->gstin,
        'igst' => $request->igst,
        'cgst' => $request->cgst,
        'sgst' => $request->sgst,
        'notes' => $request->notes,
        'is_active' => $request->has('is_active') ? 1 : 0,
    ]);

    return redirect()->route('admin.vendors.view-vendors')->with('success', 'Vendor updated successfully.');
}

public function show(Vendor $vendor)
{
    return view('admin.vendors.show', compact('vendor'));
}

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return redirect()->route('admin.vendors.view-vendors')->with('success', 'Vendor deleted successfully.');
    }
}

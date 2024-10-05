<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class VendorController extends Controller
{
    // Display a listing of all vendors
    public function index()
    {
        $vendors = Vendor::all(); // Retrieve all vendors from the database
        return view('admin.vendors.view-vendors', compact('vendors')); // Pass the variable to the view
    }

    // Show form to create a new vendor
    public function create()
    {
        return view('admin.vendors.create');
    }

    // Store a newly created vendor in storage
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'vendor_id' => 'required|unique:vendors,vendor_id',
            'vendor_name' => 'required|string|max:255',
            'vendor_contact_name' => 'nullable|string|max:255',
            'vendor_phone' => 'nullable|string|max:255',
            'vendor_email' => 'nullable|email|max:255',
            'account_head' => 'nullable|string|max:255',
            'tds_rate' => 'nullable|numeric',
            'gstin' => 'nullable|string|max:255',
            'igst' => 'nullable|numeric',
            'cgst' => 'nullable|numeric',
            'sgst' => 'nullable|numeric',
            'pan_no' => 'nullable|string|max:255',
            'tds_section_code' => 'nullable|string|max:255',
            'vendor_legal_type' => 'nullable|string|max:255',
            'payee_name' => 'nullable|string|max:255',
            'billing_address' => 'nullable|string|max:255',
            'bank_account_no' => 'nullable|string|max:255',
            'bank_name_branch' => 'nullable|string|max:255',
            'bank_ifsc_code' => 'nullable|string|max:255',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // File validation
        ]);

        try {
            // Handle file upload
            $documentPath = null;
            if ($request->hasFile('document')) {
                $documentPath = $request->file('document')->store('vendor-documents', 'public');
            }

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
                'document_path' => $documentPath, // Store file path
            ]);

            // Redirect after storing with a success message
            return redirect()->route('admin.vendors.view-vendors')->with('success', 'Vendor added successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add vendor. Please try again.');
        }
    }

    // Show the form for editing a vendor
    public function edit(Vendor $vendor)
    {
        return view('admin.vendors.edit', compact('vendor'));
    }

    // Update a specific vendor
    public function update(Request $request, Vendor $vendor)
    {
        // Validate the request
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
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // File validation
        ]);

        try {
            // Handle file update if uploaded
            if ($request->hasFile('document')) {
                // Delete the old file if it exists
                if ($vendor->document_path) {
                    Storage::delete('public/' . $vendor->document_path);
                }

                // Store the new file
                $vendor->document_path = $request->file('document')->store('vendor-documents', 'public');
            }

            // Update vendor data
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

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update vendor. Please try again.');
        }
    }

    // Display a specific vendor
    public function show(Vendor $vendor)
    {
        return view('admin.vendors.show', compact('vendor'));
    }

    // Delete a specific vendor (soft delete)
    public function destroy(Vendor $vendor)
    {
        try {
            $vendor->delete();
            return redirect()->route('admin.vendors.view-vendors')->with('success', 'Vendor deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete vendor. Please try again.');
        }
    }
}

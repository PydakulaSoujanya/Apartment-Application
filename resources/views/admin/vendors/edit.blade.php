@extends('layouts.admin')

@section('title', 'Edit Vendor')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Vendor</h2>
        <a href="{{ route('admin.vendors.view-vendors') }}" class="btn btn-primary">View Vendors</a>
    </div>
    
    <form action="{{ route('admin.vendors.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- For updating the vendor -->

        <!-- Vendor Details -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Vendor Details</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="vendor_id" class="form-label">Vendor ID</label>
                        <input type="text" name="vendor_id" id="vendor_id" class="form-control" value="{{ old('vendor_id', $vendor->vendor_id) }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="vendor_name" class="form-label">Vendor Name*</label>
                        <input type="text" name="vendor_name" id="vendor_name" class="form-control" value="{{ old('vendor_name', $vendor->vendor_name) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="vendor_contact_name" class="form-label">Vendor Contact Name</label>
                        <input type="text" name="vendor_contact_name" id="vendor_contact_name" class="form-control" value="{{ old('vendor_contact_name', $vendor->vendor_contact_name) }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="vendor_phone" class="form-label">Vendor Phone</label>
                        <input type="text" name="vendor_phone" id="vendor_phone" class="form-control" value="{{ old('vendor_phone', $vendor->vendor_phone) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="vendor_email" class="form-label">Vendor Email</label>
                        <input type="email" name="vendor_email" id="vendor_email" class="form-control" value="{{ old('vendor_email', $vendor->vendor_email) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="account_head" class="form-label">Account Head</label>
                        <select name="account_head" id="account_head" class="form-select">
                            <!-- Options should be dynamically populated from a list -->
                            <option value="Head1" {{ $vendor->account_head == 'Head1' ? 'selected' : '' }}>Head1</option>
                            <option value="Head2" {{ $vendor->account_head == 'Head2' ? 'selected' : '' }}>Head2</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea name="notes" id="notes" class="form-control">{{ old('notes', $vendor->notes) }}</textarea>
                    </div>
                    <div class="col-md-4 align-self-end">
                        <div class="form-check">
<input type="checkbox" name="is_active" id="is_active" value="1" {{ $vendor->is_active ? 'checked' : '' }}>
                            <label for="is_active" class="form-check-label">Is Vendor Active?</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendor Payment Information -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Vendor Payment Information</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="tds_rate" class="form-label">TDS Rate</label>
                        <input type="text" name="tds_rate" id="tds_rate" class="form-control" value="{{ old('tds_rate', $vendor->tds_rate) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="gstin" class="form-label">GSTIN</label>
                        <input type="text" name="gstin" id="gstin" class="form-control" value="{{ old('gstin', $vendor->gstin) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="gst_rates" class="form-label">GST Rates</label>
                        <div class="d-flex">
                            <input type="text" name="igst" id="igst" class="form-control me-2" placeholder="IGST" value="{{ old('igst', $vendor->igst) }}">
                            <input type="text" name="cgst" id="cgst" class="form-control me-2" placeholder="CGST" value="{{ old('cgst', $vendor->cgst) }}">
                            <input type="text" name="sgst" id="sgst" class="form-control" placeholder="SGST" value="{{ old('sgst', $vendor->sgst) }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="pan_no" class="form-label">PAN No.</label>
                        <input type="text" name="pan_no" id="pan_no" class="form-control" value="{{ old('pan_no', $vendor->pan_no) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="tds_section_code" class="form-label">TDS Section Code</label>
                        <select name="tds_section_code" id="tds_section_code" class="form-select">
                            <option value="194C" {{ $vendor->tds_section_code == '194C' ? 'selected' : '' }}>194C</option>
                            <option value="194J" {{ $vendor->tds_section_code == '194J' ? 'selected' : '' }}>194J</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="vendor_legal_type" class="form-label">Vendor Legal Type</label>
                        <div class="d-flex">
                            <div class="form-check me-2">
                                <input type="radio" name="vendor_legal_type" value="Company" id="company" class="form-check-input" {{ $vendor->vendor_legal_type == 'Company' ? 'checked' : '' }}>
                                <label for="company" class="form-check-label">Company</label>
                            </div>
                            <div class="form-check me-2">
                                <input type="radio" name="vendor_legal_type" value="Non Company" id="non_company" class="form-check-input" {{ $vendor->vendor_legal_type == 'Non Company' ? 'checked' : '' }}>
                                <label for="non_company" class="form-check-label">Non Company</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="vendor_legal_type" value="Professional" id="professional" class="form-check-input" {{ $vendor->vendor_legal_type == 'Professional' ? 'checked' : '' }}>
                                <label for="professional" class="form-check-label">Professional</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="payee_name" class="form-label">Payee Name</label>
                        <input type="text" name="payee_name" id="payee_name" class="form-control" value="{{ old('payee_name', $vendor->payee_name) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="billing_address" class="form-label">Billing Address</label>
                        <textarea name="billing_address" id="billing_address" class="form-control">{{ old('billing_address', $vendor->billing_address) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendor Bank Details -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Vendor Bank Details</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="bank_account_no" class="form-label">Bank Account No.</label>
                        <input type="text" name="bank_account_no" id="bank_account_no" class="form-control" value="{{ old('bank_account_no', $vendor->bank_account_no) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="bank_name_branch" class="form-label">Bank Name, Branch</label>
                        <input type="text" name="bank_name_branch" id="bank_name_branch" class="form-control" value="{{ old('bank_name_branch', $vendor->bank_name_branch) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="ifsc_code" class="form-label">IFSC Code</label>
                        <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="{{ old('ifsc_code', $vendor->ifsc_code) }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="account_type" class="form-label">Account Type</label>
                        <select name="account_type" id="account_type" class="form-select">
                            <option value="Savings" {{ $vendor->account_type == 'Savings' ? 'selected' : '' }}>Savings</option>
                            <option value="Current" {{ $vendor->account_type == 'Current' ? 'selected' : '' }}>Current</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="account_holder_name" class="form-label">Account Holder Name</label>
                        <input type="text" name="account_holder_name" id="account_holder_name" class="form-control" value="{{ old('account_holder_name', $vendor->account_holder_name) }}">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Update Vendor
        </button>
    </form>
</div>
@endsection

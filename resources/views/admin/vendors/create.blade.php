@extends('layouts.admin')

@section('title', 'Vendors')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Add New Vendor</h2>
    
    <a href="{{ route('admin.vendors.view-vendors') }}" class="btn btn-primary">View Vendors</a>
  </div> 
<form action="{{ route('admin.vendors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Vendor Details -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Vendor Details
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="vendor_id" class="form-label">Vendor ID</label>
                        <input type="text" name="vendor_id" id="vendor_id" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="vendor_name" class="form-label">Vendor Name*</label>
                        <input type="text" name="vendor_name" id="vendor_name" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="vendor_contact_name" class="form-label">Vendor Contact Name</label>
                        <input type="text" name="vendor_contact_name" id="vendor_contact_name" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="vendor_phone" class="form-label">Vendor Phone</label>
                        <input type="text" name="vendor_phone" id="vendor_phone" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="vendor_email" class="form-label">Vendor Email</label>
                        <input type="email" name="vendor_email" id="vendor_email" class="form-control">
                    </div>
                    <div class="col-md-4">
    <label for="account_head" class="form-label">Account Head</label>
    <input type="text" name="account_head" id="account_head" class="form-control">
</div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea name="notes" id="notes" class="form-control"></textarea>
                    </div>
                    <div class="col-md-4 align-self-end">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input">
                            <label for="is_active" class="form-check-label">Is Vendor Active?</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendor Payment Information -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Vendor Payment Information
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="tds_rate" class="form-label">TDS Rate</label>
                        <input type="text" name="tds_rate" id="tds_rate" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="gstin" class="form-label">GSTIN</label>
                        <input type="text" name="gstin" id="gstin" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="gst_rates" class="form-label">GST Rates</label>
                        <div class="d-flex">
                            <input type="text" name="igst" id="igst" class="form-control me-2" placeholder="IGST">
                            <input type="text" name="cgst" id="cgst" class="form-control me-2" placeholder="CGST">
                            <input type="text" name="sgst" id="sgst" class="form-control" placeholder="SGST">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="pan_no" class="form-label">PAN No.</label>
                        <input type="text" name="pan_no" id="pan_no" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="tds_section_code" class="form-label">TDS Section Code</label>
                        <select name="tds_section_code" id="tds_section_code" class="form-select">
                            <option value="194C">194C</option>
                            <option value="194J">194J</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="vendor_legal_type" class="form-label">Vendor Legal Type</label>
                        <div class="d-flex">
                            <div class="form-check me-2">
                                <input type="radio" name="vendor_legal_type" value="Company" id="company" class="form-check-input">
                                <label for="company" class="form-check-label">Company</label>
                            </div>
                            <div class="form-check me-2">
                                <input type="radio" name="vendor_legal_type" value="Non Company" id="non_company" class="form-check-input">
                                <label for="non_company" class="form-check-label">Non Company</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="vendor_legal_type" value="Professional" id="professional" class="form-check-input">
                                <label for="professional" class="form-check-label">Professional</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="payee_name" class="form-label">Payee Name</label>
                        <input type="text" name="payee_name" id="payee_name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="billing_address" class="form-label">Billing Address</label>
                        <textarea name="billing_address" id="billing_address" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendor Bank Details -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Vendor Bank Details
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="bank_account_no" class="form-label">Bank Account No.</label>
                        <input type="text" name="bank_account_no" id="bank_account_no" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="bank_name_branch" class="form-label">Bank Name, Branch</label>
                        <input type="text" name="bank_name_branch" id="bank_name_branch" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="bank_ifsc_code" class="form-label">Bank NEFT/IFSC Code</label>
                        <input type="text" name="bank_ifsc_code" id="bank_ifsc_code" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendor Attachments -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Vendor Attachments
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="file_1" class="form-label">File 1</label>
                        <input type="file" name="file_1" id="file_1" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="file_2" class="form-label">File 2</label>
                        <input type="file" name="file_2" id="file_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="file_3" class="form-label">File 3</label>
                        <input type="file" name="file_3" id="file_3" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Save Expense
        </button>
        <a href="{{ route('admin.vendors.view-vendors') }}" class="btn btn-primary">
    <i class="fas fa-save me-2"></i>Close
</a>

    </form>
</div>
@endsection
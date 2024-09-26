<!DOCTYPE html>
<html>
<head>
    <title>Vendor Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            width: 50%;
            margin-left: 70px;
        }
        .container h3 {
            margin-left: 70px;
        }
    </style>
</head>
<body>
@extends('layouts.admin')

@section('title', 'Vendor Details')

@section('content')
<div class="container mt-5">
    <h3>Vendor Details</h3>
    <div class="card justify-content-between">
        <div class="card-body">
            <p class="card-title"><b>Vendor ID</b>: {{ $vendor->vendor_id }}</p>
            <p class="card-title"><b>Vendor Name</b>: {{ $vendor->vendor_name }}</p>
            <p class="card-title"><b>Contact Name</b>: {{ $vendor->vendor_contact_name }}</p>
            <p class="card-text"><b>Phone Number</b>: {{ $vendor->vendor_phone }}</p>
            <p class="card-text"><b>Email</b>: {{ $vendor->vendor_email }}</p>
            <p class="card-text"><b>Account Head</b>: {{ $vendor->account_head }}</p>
            <p class="card-text"><b>TDS Rate</b>: {{ $vendor->tds_rate }}</p>
            <p class="card-text"><b>GSTIN</b>: {{ $vendor->gstin }}</p>
            <p class="card-text"><b>IGST</b>: {{ $vendor->igst }}</p>
            <p class="card-text"><b>CGST</b>: {{ $vendor->cgst }}</p>
            <p class="card-text"><b>SGST</b>: {{ $vendor->sgst }}</p>
            <p class="card-text"><b>Notes</b>: {{ $vendor->notes }}</p>
            <p class="card-text"><b>Bank Account No</b>: {{ $vendor->bank_account_no }}</p>
            <p class="card-text"><b>Bank Name/Branch</b>: {{ $vendor->bank_name_branch }}</p>
            <p class="card-text"><b>Bank IFSC Code</b>: {{ $vendor->bank_ifsc_code }}</p>

            <a href="{{ route('admin.vendors.view-vendors') }}" class="btn btn-dark">Back to Vendors</a>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
</body>
</html>

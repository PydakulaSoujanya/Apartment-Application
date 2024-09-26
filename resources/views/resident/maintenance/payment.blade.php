@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Maintenance Payment</h3>
        </div>
        <div class="card-body">
            <!-- Display logged-in user details -->
            <form id="maintenancePaymentForm" action="{{ route('maintenance.processPayment') }}" method="POST">
                @csrf
                
                <!-- Resident Details -->
                <div class="mb-3">
                    <label for="userName" class="form-label">Resident Name</label>
                    <input type="text" class="form-control" id="userName" value="{{ $residentDetails->name ?? 'N/A' }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="userEmail" value="{{ $residentDetails->email ?? 'N/A' }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="userMobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="userMobile" value="{{ $residentDetails->mobile ?? 'N/A' }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="flatNumber" class="form-label">Flat Number</label>
                    <input type="text" class="form-control" id="flatNumber" value="{{ $residentDetails->flat_number ?? 'N/A' }}" readonly>
                </div>

                <!-- <div class="mb-3">
                    <label for="floor" class="form-label">Floor</label>
                    <input type="text" class="form-control" id="floor" value="{{ $residentDetails->floor ?? 'N/A' }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="block" class="form-label">Block</label>
                    <input type="text" class="form-control" id="block" value="{{ $residentDetails->block ?? 'N/A' }}" readonly>
                </div> -->

                <!-- <div class="mb-3">
                    <label for="flatType" class="form-label">Flat Type</label>
                    <input type="text" class="form-control" id="flatType" value="{{ $residentDetails->flat_type ?? 'N/A' }}" readonly>
                </div> -->

                <!-- <div class="mb-3">
                    <label for="flatHolderName" class="form-label">Flat Holder Name</label>
                    <input type="text" class="form-control" id="flatHolderName" value="{{ $residentDetails->flat_holder_name ?? 'N/A' }}" readonly>
                </div> -->

                <!-- <div class="mb-3">
                    <label for="aadharNo" class="form-label">Aadhar Number</label>
                    <input type="text" class="form-control" id="aadharNo" value="{{ $residentDetails->aadhar_no ?? 'N/A' }}" readonly>
                </div> -->

                <!-- <div class="mb-3">
                    <label for="familyMembers" class="form-label">Family Members</label>
                    <input type="text" class="form-control" id="familyMembers" value="{{ $residentDetails->family_members ?? 'N/A' }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="vehicles" class="form-label">Vehicles</label>
                    <input type="text" class="form-control" id="vehicles" value="{{ $residentDetails->vehicles ?? 'N/A' }}" readonly>
                </div> -->

                <div class="mb-3">
                    <label for="area" class="form-label">Area</label>
                    <input type="text" class="form-control" id="area" value="{{ $residentDetails->area ?? 'N/A' }}" readonly>
                </div>

                <!-- Maintenance Fee -->
                <div class="mb-3">
                    <label for="maintenanceFee" class="form-label">Maintenance Fee</label>
                    <input type="text" class="form-control" id="maintenanceFee" value="{{ $maintenance_fee }}" readonly>
                </div>

                <!-- Payment Amount (optional) -->
                <div class="mb-3">
                    <label for="paymentAmount" class="form-label">Payment Amount</label>
                    <input type="number" class="form-control" id="paymentAmount" name="paymentAmount" value="{{ $maintenance_fee }}" readonly>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Pay Now</button>
            </form>
        </div>
    </div>
</div>
@endsection

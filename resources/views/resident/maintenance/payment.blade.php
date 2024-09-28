@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display Error Message -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Maintenance Payment</h3>
        </div>
        <div class="card-body">
            <!-- Payment Form -->
            <form id="maintenancePaymentForm" action="{{ route('resident.maintenance.pay') }}" method="POST">
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

                <div class="mb-3">
                    <label for="area" class="form-label">Area</label>
                    <input type="text" class="form-control" id="area" value="{{ $residentDetails->area ?? 'N/A' }}" readonly>
                </div>

                <!-- Maintenance Fee -->
                <div class="mb-3">
                    <label for="maintenanceFee" class="form-label">Maintenance Fee</label>
                    <input type="text" class="form-control" id="maintenanceFee" value="₹4500" readonly>
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="₹4500" required>
                </div>

                <!-- Date of Payment -->
                <div class="mb-3">
                    <label for="paymentDate" class="form-label">Payment Date</label>
                    <input type="date" class="form-control" id="paymentDate" name="payment_date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                </div>

                <!-- Mode of Payment -->
                <div class="mb-3">
                    <label for="modeOfPayment" class="form-label">Mode of Payment</label>
                    <select class="form-control" id="modeOfPayment" name="mode_of_payment" required>
                        <option value="online">Online</option>
                        <option value="offline">Offline</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Pay Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
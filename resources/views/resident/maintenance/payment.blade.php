@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Maintenance Payment</h3>
        </div>
        <div class="card-body">
            <form id="maintenancePaymentForm" action="{{ route('resident.maintenance.pay') }}" method="POST">
                @csrf

                <!-- Resident Details -->
                <div class="mb-3">
                    <label for="userName" class="form-label">Resident Name</label>
                    <input type="text" class="form-control" id="userName" value="{{ $residentDetails->name ?? 'N/A' }}" readonly>
                </div>
                
                <!-- Maintenance Fee -->
                <div class="mb-3">
                    <label for="maintenanceFee" class="form-label">Maintenance Fee</label>
                    <input type="text" class="form-control" id="maintenanceFee" value="₹{{ number_format($totalAmountDue, 2) }}" readonly>
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="{{ $totalAmountDue }}" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Pay Now</button>
            </form>
        </div>
    </div>
</div>
@endsection

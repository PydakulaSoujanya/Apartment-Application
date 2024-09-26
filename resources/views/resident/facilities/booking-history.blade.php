@extends('layouts.resident')

@section('title', 'Booking History')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold">Booking History</h3>
        <a href="{{ route('resident.facilities.index') }}" class="btn btn-primary booking-history-btn">Back to Booking</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>S.No</th> <!-- Serial number column -->
                        <th>Facility</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Booked For</th>
                        <th>Community Purpose</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Displaying serial number -->
                            <td>{{ $booking->facility_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                            <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                            <td>{{ $booking->booked_for }}</td>
                            <td>{{ $booking->community_purpose ? 'Yes' : 'No' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No bookings found</td> <!-- Update colspan to match new column count -->
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <style>
        body {
            background-color: #ffffff; /* Set background color to white */
        }
        .container, .card {
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* Ensure container background is white */
        }
        h3 {
            color: #007bff;
        }
        .table thead th {
            background-color: #007bff;
            color: #ffffff;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        /* Media query for mobile and iPad devices */
        @media (max-width: 1024px) {
            .container {
                padding: 15px;
            }
            .table {
                font-size: 0.9rem;
            }
            .btn-primary {
                width: 100%;
            }
        }
    </style>
@endpush

@push('scripts')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
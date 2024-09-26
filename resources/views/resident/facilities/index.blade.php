<style>
    body {
        background-color: #ffffff;
    }

    #pass-card {
        max-width: 80%; /* Set the width to 70% */
        margin: auto; /* Center the card horizontally */
    }

    .card-header {
        background-color: #f7f7f7;
        color: #333;
        font-weight: bold;
        border-radius: 10px 10px 0 0;
        border-bottom: 1px solid #e0e0e0;
        padding: 15px;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .btn-check-availability {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-check-availability:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    @media (max-width: 1024px) {
        #pass-card {
            max-width: 100%; /* Make sure it adjusts to full width on smaller screens */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-check-availability {
            width: 100%;
        }
    }
</style>
@extends('layouts.resident')

@section('title', 'Book a Facility')

@section('content')
<div class="container mt-5">
    <div class="card" id="pass-card">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold">Book a Facility</h5>
            <a href="{{ route('resident.facilities.booking-history') }}" class="btn btn-primary">Booking History</a>
        </div>

        <form action="{{ route('resident.facilities.check-availability') }}" method="POST" class="m-3">
            @csrf

            <div class="row mb-3">
                <!-- Facility Selection -->
                <div class="col-md-3">
                    <label for="facility">Facility</label>
                </div>
                <div class="col-md-9">
                    <select class="form-control" id="facility" name="facility">
                        <option value="">Select a facility</option>
                        @foreach($facilities as $facility)
                            <option value="{{ $facility->id }}">{{ $facility->facility_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <!-- Date Selection -->
                <div class="col-md-3">
                    <label for="date">Date</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control datepicker" id="date" placeholder="Select Date" name="date">
                </div>
            </div>

            <div class="row mb-3">
                <!-- Start Time -->
                <div class="col-md-3">
                    <label for="start_time">Start Time</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="start_time" placeholder="Start Time" name="start_time" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <!-- End Time -->
                <div class="col-md-3">
                    <label for="end_time">End Time</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="end_time" placeholder="End Time" name="end_time" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <!-- Booked For -->
                <div class="col-md-3">
                    <label for="bookedFor">Booked For</label>
                </div>
                <div class="col-md-9">
                    <select class="form-control" id="bookedFor" name="bookedFor">
                        <option value="">Select Office</option>
                        <option value="A-0201">A-0201</option>
                        <option value="A-0202">A-0202</option>
                        <option value="A-0304">A-0304</option>
                        <option value="A-0401">A-0401</option>
                        <option value="A-0504">A-0504</option>
                        <option value="A-0601">A-0601</option>
                        <option value="A-0602">A-0602</option>
                        <option value="A-0603">A-0603</option>
                        <option value="A-0701">A-0701</option>
                        <option value="A-0702">A-0702</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <!-- Community Purpose -->
                <div class="col-md-3">
                    <label for="communityPurpose">Community Purpose</label>
                </div>
                <div class="col-md-9">
                    <select class="form-control" id="communityPurpose" name="communityPurpose">
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-check-availability">Check Availability</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#date", {
            dateFormat: "Y-m-d",
            minDate: "today"
        });

        document.getElementById('facility').addEventListener('change', function() {
            var facilityId = this.value;
            if (facilityId) {
                fetch(/residentfacilities/get-times/${facilityId})
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('start_time').value = data.start_time;
                        document.getElementById('end_time').value = data.end_time;
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('start_time').value = '';
                document.getElementById('end_time').value = '';
            }
        });
    });
</script>

@endpush
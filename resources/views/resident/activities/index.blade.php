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

@section('title', 'Document')

@section('content')
<div class="container mt-5">
    <div class="card" id="pass-card">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold">Activity</h5>
            <a href="{{ route('resident.activities.booking-history') }}" class="btn btn-primary mt-2">Booking History</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card-body">
            <form>
                <div class="form-group row mb-3">
                    <label for="facility" class="col-sm-4 col-form-label text-right pr-4">Activity</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="facility" placeholder="Enter activity">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="date" class="col-sm-4 col-form-label text-right pr-4">Date</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="date" placeholder="Select date">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="time" class="col-sm-4 col-form-label text-right pr-4">Time</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="time" placeholder="Select time">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="bookedFor" class="col-sm-4 col-form-label text-right pr-4">Booked For</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="bookedFor">
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

                <div class="form-group row mb-3">
                    <label for="communityPurpose" class="col-sm-4 col-form-label text-right pr-4">Community Purpose</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="communityPurpose">
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8 offset-sm-4">
                        <button type="submit" class="btn btn-primary btn-check-availability">Check Availability</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
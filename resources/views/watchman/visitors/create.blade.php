<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


@extends('layouts.watchman')

@section('title', 'All Visitors')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Create Visitor</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('visitors.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <!-- <div class="col-md-6">
                        <label for="flatNumber" class="form-label">Flat Number</label>
                        <select class="form-select" id="flatNumber" name="flat_number" style="width: 100%;">
                            <option value="101">101</option>
                            <option value="202">202</option>
                        </select>
                    </div> -->
                    <div class="col-md-6">
                        <label for="flatNumber" class="form-label">Flat Number</label>
                        <select class="form-select" id="flatNumber" name="flat_number" style="width: 100%;">
                            <option value="" disabled selected>Select Flat Number</option>
                            @foreach($flatNumbers as $flatNumber)
                                <option value="{{ $flatNumber }}" {{ (old('flat_number') == $flatNumber) ? 'selected' : '' }}>{{ $flatNumber }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="residentName" class="form-label">Resident Name</label>
                        <input type="text" class="form-control" id="residentName" name="resident_name" value="{{ old('resident_name', $residentName) }}" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="mobile" class="form-label">Resident Contact</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="">
                    </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="visitorName" class="form-label">Visitor Name</label>
                        <input type="text" class="form-control" id="visitorName" name="visitor_name" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="visitorEmail" class="form-label">Visitor Email</label>
                        <input type="email" class="form-control" id="visitorEmail" name="visitor_email" placeholder="">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="visitorPhoneNumber" class="form-label">Visitor Phone Number</label>
                        <input type="text" class="form-control" id="visitorPhoneNumber" name="visitor_number" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="visitingDate" class="form-label">Visiting Date</label>
                        <input type="date" class="form-control" id="visitingDate" name="visiting_date">
                    </div>
                    <!-- <div class="col-md-6">
    <label for="status_approved" class="form-label">Status Approved</label>
    <input type="text" class="form-control" id="status_approved" name="status_approved" placeholder="Enter status approval">
</div> -->

   

                </div>

                <div class="mb-3">
                    <label for="visitingReason" class="form-label">Visiting Reason</label>
                    <textarea class="form-control" id="visitingReason" name="visiting_reason" rows="3" placeholder="Enter visiting reason"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create Visitor</button>
            </form>
        </div>
    </div>
</div>

@endsection
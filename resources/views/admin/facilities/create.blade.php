@extends('layouts.admin')

@section('title', 'Add New Facility')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9"> 
            <div class="card" id="facility-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Add New Facility') }}</h5>
                    <a href="{{ route('admin.facilities.index') }}" class="btn btn-primary">{{ __('Facilities List') }}</a>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('admin.facilities.store') }}" method="POST">
                        @csrf

                        <!-- Facility Name -->
                        <div class="form-group row mb-3">
                            <label for="facilityName" class="col-md-4 col-form-label text-md-right">Facility Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="facilityName" name="facility_name" placeholder="Enter facility name" required>
                            </div>
                        </div>

                        <!-- Start Time -->
                        <div class="form-group row mb-3">
                            <label for="startTime" class="col-md-4 col-form-label text-md-right">Start Time</label>
                            <div class="col-md-8">
                                <input type="time" class="form-control" id="startTime" name="start_time" required>
                            </div>
                        </div>

                        <!-- End Time -->
                        <div class="form-group row mb-3">
                            <label for="endTime" class="col-md-4 col-form-label text-md-right">End Time</label>
                            <div class="col-md-8">
                                <input type="time" class="form-control" id="endTime" name="end_time" required>
                            </div>
                        </div>

                        <!-- Charge Per Day -->
                        <div class="form-group row mb-3">
                            <label for="chargePerDay" class="col-md-4 col-form-label text-md-right">Charge Per Day</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" id="chargePerDay" name="charge_per_day" placeholder="Enter charge per day (e.g., 1000)" required>
                            </div>
                        </div>

                        <!-- Booking Cancel Days -->
                        <div class="form-group row mb-3">
                            <label for="cancelDays" class="col-md-4 col-form-label text-md-right">Booking Cancel Days If Not Paid</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" id="cancelDays" name="cancel_days" placeholder="Enter number of days after which booking will be cancelled if not paid" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary mt-2">Add Facility</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

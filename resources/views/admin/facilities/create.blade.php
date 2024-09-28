@extends('layouts.admin')

@section('title', 'Add New Facility')

@section('content')
<div class="container">
    <div class="card" id="facility-card">
        <div class="d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0">Add New Facility</h5>
            <a href="{{ route('admin.facilities.index') }}" class="btn btn-primary mt-2">Facilities List</a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="card-body">
            <form action="{{ route('admin.facilities.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="facilityName">Facility Name</label>
                    <input type="text" class="form-control" id="facilityName" name="facility_name" placeholder="Enter facility name" required>
                </div>

               

                <!-- <div class="form-group">
    <label for="timeSlot">Time Slot</label>
    <input type="time" class="form-control" id="timeSlot" name="time_slot" placeholder="Enter time slot duration (e.g., 100)" required>
</div> -->
                <div class="form-group">
                    <label for="timeSlot">Start Time</label>
                    <input type="time" class="form-control" id="startTime" name="start_time" placeholder="Enter start Time (e.g., 09:00 - 17:00)" required>
                </div>
                <div class="form-group">
                    <label for="timeSlot">End Time</label>
                    <input type="time" class="form-control" id="endTime" name="end_time" placeholder="Enter End Time (e.g., 09:00 - 17:00)" required>
                </div>


                <div class="form-group">
                    <label for="chargePerDay">Charge Per Day</label>
                    <input type="number" class="form-control" id="chargePerDay" name="charge_per_day" placeholder="Enter charge per day (e.g., 1000)" required>
                </div>

                <div class="form-group">
                    <label for="cancelDays">Booking Cancel Days If Not Paid</label>
                    <input type="number" class="form-control" id="cancelDays" name="cancel_days" placeholder="Enter number of days after which booking will be cancelled if not paid" required>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Add Facility</button>
            </form>
        </div>
    </div>
</div>
@endsection
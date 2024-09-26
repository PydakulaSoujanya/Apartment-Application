@extends('layouts.admin')

@section('title', 'Edit Facility')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h5>Edit Facility</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="facility_name">Facility Name</label>
                    <input type="text" name="facility_name" id="facility_name" class="form-control" value="{{ old('facility_name', $facility->facility_name) }}" required>
                </div>
              

                <div class="form-group">
                    <label for="timeSlot">Start Time</label>
                    <input type="time" class="form-control" id="startTime" name="start_time"  value="{{ old('start_time', $facility->start_time) }}" required>
                </div>
                <div class="form-group">
                    <label for="timeSlot">End Time</label>
                    <input type="time" class="form-control" id="endTime" name="end_time" value="{{ old('end_time', $facility->end_time) }}" required>
                </div>


                <div class="form-group">
                    <label for="charge_per_day">Charge Per Day</label>
                    <input type="number" name="charge_per_day" id="charge_per_day" class="form-control" value="{{ old('charge_per_day', $facility->charge_per_day) }}" required>
                </div>
                <div class="form-group">
                    <label for="cancel_days">Cancel Days</label>
                    <input type="number" name="cancel_days" id="cancel_days" class="form-control" value="{{ old('cancel_days', $facility->cancel_days) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Facility</button>
            </form>
        </div>
    </div>
</div>
@endsection
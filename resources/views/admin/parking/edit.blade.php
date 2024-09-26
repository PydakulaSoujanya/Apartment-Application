@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Vehicle</h2>
    <form action="{{ route('parking.update', $parking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="slot_no">Slot No</label>
            <input type="text" class="form-control" name="slot_no" value="{{ $parking->slot_no }}" required>
        </div>
        <div class="form-group">
            <label for="slot_name">Slot Name</label>
            <input type="text" class="form-control" name="slot_name" value="{{ $parking->slot_name }}" required>
        </div>
        <div class="form-group">
            <label for="slot_type">Slot Type</label>
            <input type="text" class="form-control" name="slot_type" value="{{ $parking->slot_type }}" required>
        </div>
        <div class="form-group">
            <label for="block">Block</label>
            <input type="text" class="form-control" name="block" value="{{ $parking->block }}" required>
        </div>
        <div class="form-group">
            <label for="unit_no">Unit No</label>
            <input type="text" class="form-control" name="unit_no" value="{{ $parking->unit_no }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" name="status" value="{{ $parking->status }}" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $parking->name }}" required>
        </div>
        <div class="form-group">
            <label for="vehicle_no">Vehicle No</label>
            <input type="text" class="form-control" name="vehicle_no" value="{{ $parking->vehicle_no }}" required>
        </div>
        <div class="form-group">
            <label for="vehicle_type">Vehicle Type</label>
            <input type="text" class="form-control" name="vehicle_type" value="{{ $parking->vehicle_type }}" required>
        </div>
        <div class="form-group">
            <label for="rfid_no">RFID No</label>
            <input type="text" class="form-control" name="rfid_no" value="{{ $parking->rfid_no }}" required>
        </div>
        <div class="form-group">
            <label for="from_date">From Date</label>
            <input type="date" class="form-control" name="from_date" value="{{ $parking->from_date }}" required>
        </div>
        <div class="form-group">
            <label for="to_date">To Date</label>
            <input type="date" class="form-control" name="to_date" value="{{ $parking->to_date }}" required>
        </div>
        <div class="form-group">
            <label for="additional_info">Additional Info</label>
            <textarea class="form-control" name="additional_info" required>{{ $parking->additional_info }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

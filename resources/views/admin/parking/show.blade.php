@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Parking Details</h2>
    <div class="mb-3">
        <strong>Slot No:</strong> {{ $parking->slot_no }}<br>
        <strong>Slot Name:</strong> {{ $parking->slot_name }}<br>
        <strong>Slot Type:</strong> {{ $parking->slot_type }}<br>
        <strong>Block:</strong> {{ $parking->block }}<br>
        <strong>Unit No:</strong> {{ $parking->unit_no }}<br>
        <strong>Status:</strong> {{ $parking->status }}<br>
        <strong>Name:</strong> {{ $parking->name }}<br>
        <strong>Vehicle No:</strong> {{ $parking->vehicle_no }}<br>
        <strong>Vehicle Type:</strong> {{ $parking->vehicle_type }}<br>
        <strong>RFID No:</strong> {{ $parking->rfid_no }}<br>
        <strong>From Date:</strong> {{ $parking->from_date }}<br>
        <strong>To Date:</strong> {{ $parking->to_date }}<br>
        <strong>Additional Info:</strong> {{ $parking->additional_info }}<br>
    </div>
   
    <a href="{{ route('parking.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection

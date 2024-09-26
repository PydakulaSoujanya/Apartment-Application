@extends('layouts.admin')

@section('title', 'Parking')


@section('content')
<div class="container">
    <h2>Add New Vehicle</h2>
    <form action="{{ route('parking.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="slot_no">Slot No</label>
            <input type="text" class="form-control" name="slot_no" placeholder="Enter Slot No">
        </div>
        <div class="form-group">
            <label for="slot_name">Slot Name</label>
            <input type="text" class="form-control" name="slot_name" placeholder="Enter Slot Name">
        </div>
        <div class="form-group">
            <label for="slot_type">Slot Type</label>
            <input type="text" class="form-control" name="slot_type" placeholder="Enter Slot Type">
        </div>
        <div class="form-group">
            <label for="block">Block</label>
            <input type="text" class="form-control" name="block" placeholder="Enter Block">
        </div>
        <div class="form-group">
            <label for="unit_no">Unit No</label>
            <input type="text" class="form-control" name="unit_no" placeholder="Enter Unit No">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" name="status" placeholder="Enter Status">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="vehicle_no">Vehicle No</label>
            <input type="text" class="form-control" name="vehicle_no" placeholder="Enter Vehicle No">
        </div>
        <div class="form-group">
            <label for="vehicle_type">Vehicle Type</label>
            <input type="text" class="form-control" name="vehicle_type" placeholder="Enter Vehicle Type">
        </div>
        <div class="form-group">
            <label for="rfid_no">RFID No</label>
            <input type="text" class="form-control" name="rfid_no" placeholder="Enter RFID No">
        </div>
        <div class="form-group">
            <label for="from_date">From Date</label>
            <input type="date" class="form-control" name="from_date">
        </div>
        <div class="form-group">
            <label for="to_date">To Date</label>
            <input type="date" class="form-control" name="to_date">
        </div>
        <div class="form-group">
            <label for="additional_info">Additional Info</label>
            <textarea class="form-control" name="additional_info" placeholder="Enter Additional Info"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


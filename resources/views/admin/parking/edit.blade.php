@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9"> 
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Edit Vehicle') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('parking.update', $parking->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Slot No -->
                        <div class="form-group row mb-3">
                            <label for="slot_no" class="col-md-4 col-form-label text-md-right">Slot No</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="slot_no" value="{{ $parking->slot_no }}" required>
                            </div>
                        </div>

                        <!-- Slot Name -->
                        <div class="form-group row mb-3">
                            <label for="slot_name" class="col-md-4 col-form-label text-md-right">Slot Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="slot_name" value="{{ $parking->slot_name }}" required>
                            </div>
                        </div>

                        <!-- Slot Type -->
                        <div class="form-group row mb-3">
                            <label for="slot_type" class="col-md-4 col-form-label text-md-right">Slot Type</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="slot_type" value="{{ $parking->slot_type }}" required>
                            </div>
                        </div>

                        <!-- Block -->
                        <div class="form-group row mb-3">
                            <label for="block" class="col-md-4 col-form-label text-md-right">Block</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="block" value="{{ $parking->block }}" required>
                            </div>
                        </div>

                        <!-- Unit No -->
                        <div class="form-group row mb-3">
                            <label for="unit_no" class="col-md-4 col-form-label text-md-right">Unit No</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="unit_no" value="{{ $parking->unit_no }}" required>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="status" value="{{ $parking->status }}" required>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{ $parking->name }}" required>
                            </div>
                        </div>

                        <!-- Vehicle No -->
                        <div class="form-group row mb-3">
                            <label for="vehicle_no" class="col-md-4 col-form-label text-md-right">Vehicle No</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="vehicle_no" value="{{ $parking->vehicle_no }}" required>
                            </div>
                        </div>

                        <!-- Vehicle Type -->
                        <div class="form-group row mb-3">
                            <label for="vehicle_type" class="col-md-4 col-form-label text-md-right">Vehicle Type</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="vehicle_type" value="{{ $parking->vehicle_type }}" required>
                            </div>
                        </div>

                        <!-- RFID No -->
                        <div class="form-group row mb-3">
                            <label for="rfid_no" class="col-md-4 col-form-label text-md-right">RFID No</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="rfid_no" value="{{ $parking->rfid_no }}" required>
                            </div>
                        </div>

                        <!-- From Date -->
                        <div class="form-group row mb-3">
                            <label for="from_date" class="col-md-4 col-form-label text-md-right">From Date</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" name="from_date" value="{{ $parking->from_date }}" required>
                            </div>
                        </div>

                        <!-- To Date -->
                        <div class="form-group row mb-3">
                            <label for="to_date" class="col-md-4 col-form-label text-md-right">To Date</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" name="to_date" value="{{ $parking->to_date }}" required>
                            </div>
                        </div>

                        <!-- Additional Info -->
                        <div class="form-group row mb-3">
                            <label for="additional_info" class="col-md-4 col-form-label text-md-right">Additional Info</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="additional_info" required>{{ $parking->additional_info }}</textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

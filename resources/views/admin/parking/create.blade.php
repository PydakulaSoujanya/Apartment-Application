@extends('layouts.admin')

@section('title', 'Parking')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9"> 
            <div class="card" id="activity-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Add New Vehicle') }}</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('parking.store') }}" method="POST">
                        @csrf

                        <!-- First Part -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Slot No -->
                                <div class="form-group row mb-3">
                                    <label for="slot_no" class="col-md-4 col-form-label text-md-right">Slot No</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="slot_no" placeholder="Enter Slot No">
                                    </div>
                                </div>

                                <!-- Slot Name -->
                                <div class="form-group row mb-3">
                                    <label for="slot_name" class="col-md-4 col-form-label text-md-right">Slot Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="slot_name" placeholder="Enter Slot Name">
                                    </div>
                                </div>

                                <!-- Slot Type -->
                                <div class="form-group row mb-3">
                                    <label for="slot_type" class="col-md-4 col-form-label text-md-right">Slot Type</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="slot_type" placeholder="Enter Slot Type">
                                    </div>
                                </div>

                                <!-- Block -->
                                <div class="form-group row mb-3">
                                    <label for="block" class="col-md-4 col-form-label text-md-right">Block</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="block" placeholder="Enter Block">
                                    </div>
                                </div>

                                <!-- Unit No -->
                                <div class="form-group row mb-3">
                                    <label for="unit_no" class="col-md-4 col-form-label text-md-right">Unit No</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="unit_no" placeholder="Enter Unit No">
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group row mb-3">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="status" placeholder="Enter Status">
                                    </div>
                                </div>
                            </div>

                            <!-- Second Part -->
                            <div class="col-md-6">
                                <!-- Name -->
                                <div class="form-group row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                    </div>
                                </div>

                                <!-- Vehicle No -->
                                <div class="form-group row mb-3">
                                    <label for="vehicle_no" class="col-md-4 col-form-label text-md-right">Vehicle No</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="vehicle_no" placeholder="Enter Vehicle No">
                                    </div>
                                </div>

                                <!-- Vehicle Type -->
                                <div class="form-group row mb-3">
                                    <label for="vehicle_type" class="col-md-4 col-form-label text-md-right">Vehicle Type</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="vehicle_type" placeholder="Enter Vehicle Type">
                                    </div>
                                </div>

                                <!-- RFID No -->
                                <div class="form-group row mb-3">
                                    <label for="rfid_no" class="col-md-4 col-form-label text-md-right">RFID No</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="rfid_no" placeholder="Enter RFID No">
                                    </div>
                                </div>

                                <!-- From Date -->
                                <div class="form-group row mb-3">
                                    <label for="from_date" class="col-md-4 col-form-label text-md-right">From Date</label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" name="from_date">
                                    </div>
                                </div>

                                <!-- To Date -->
                                <div class="form-group row mb-3">
                                    <label for="to_date" class="col-md-4 col-form-label text-md-right">To Date</label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" name="to_date">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Info -->
                        <div class="form-group row mb-3">
                            <label for="additional_info" class="col-md-4 col-form-label text-md-right">Additional Info</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="additional_info" placeholder="Enter Additional Info"></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

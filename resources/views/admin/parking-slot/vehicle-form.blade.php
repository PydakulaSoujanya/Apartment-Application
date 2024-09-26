@extends('layouts.admin')
@section('title', 'Add Vehicle')
@section('content')

   <!-- Correct Bootstrap and jQuery links -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

   <style>
      .table-header {
         background-color: #d7f0cc;
      }

      .block-links a {
         margin-right: 10px;
         color: red;
      }

      .top-right {
         position: absolute;
         top: 10px;
         right: 10px;
      }
   </style>
  <div class="container mt-4">
    <h3>Add New Vehicle</h3>

    @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


<form action="{{ route('admin.parking-slot.store-vehicle') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="slotNo" class="form-label">Slot No</label>
        <input type="text" class="form-control" id="slotNo" name="slotNo" placeholder="Enter Slot No">
    </div>
    <div class="mb-3">
        <label for="slotName" class="form-label">Slot Name</label>
        <input type="text" class="form-control" id="slotName" name="slotName" placeholder="Enter Slot Name">
    </div>
    <div class="mb-3">
        <label for="slotType" class="form-label">Slot Type</label>
        <input type="text" class="form-control" id="slotType" name="slotType" placeholder="Enter Slot Type">
    </div>
    <div class="mb-3">
        <label for="block" class="form-label">Block</label>
        <input type="text" class="form-control" id="block" name="block" placeholder="Enter Block">
    </div>
    <div class="mb-3">
        <label for="unitNo" class="form-label">Unit No</label>
        <input type="text" class="form-control" id="unitNo" name="unitNo" placeholder="Enter Unit No">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status" placeholder="Enter Status">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
    </div>
    <div class="mb-3">
        <label for="vehicleNo" class="form-label">Vehicle No</label>
        <input type="text" class="form-control" id="vehicleNo" name="vehicleNo" placeholder="Enter Vehicle No">
    </div>
    <div class="mb-3">
        <label for="vehicleType" class="form-label">Vehicle Type</label>
        <input type="text" class="form-control" id="vehicleType" name="vehicleType" placeholder="Enter Vehicle Type">
    </div>
    <div class="mb-3">
        <label for="rfidNo" class="form-label">RFID No</label>
        <input type="text" class="form-control" id="rfidNo" name="rfidNo" placeholder="Enter RFID No">
    </div>
    <div class="mb-3">
        <label for="fromDate" class="form-label">From Date</label>
        <input type="date" class="form-control" id="fromDate" name="fromDate">
    </div>
    <div class="mb-3">
        <label for="toDate" class="form-label">To Date</label>
        <input type="date" class="form-control" id="toDate" name="toDate">
    </div>
    <div class="mb-3">
        <label for="additionalField" class="form-label">Additional Field</label>
        <input type="text" class="form-control" id="additionalField" name="additionalField" placeholder="Enter Additional Info">
    </div>
    <button type="submit" class="btn btn-primary">Save Vehicle</button>
</form>

  </div>
@endsection

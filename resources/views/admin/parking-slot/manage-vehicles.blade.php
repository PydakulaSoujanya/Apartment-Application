@extends('layouts.admin')
@section('title', 'Parking')
@section('content')

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
      <h3 class="mb-4">Vehicles</h3>

      <!-- Add Vehicle Button -->
      <div class="d-flex justify-content-between mb-3">
<!-- Add Vehicle Button -->
<div class="d-flex justify-content-between mb-3">
    <a href="{{ route('admin.parking-slot.add-vehicle') }}" class="btn btn-primary">Add Vehicle</a>
</div>
      </div>

      <!-- Navigation Links -->
      <ul class="nav nav-tabs">
         <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.parking-slot.vehicles-data') }}">All Vehicles</a>
         </li>
      </ul>

      <!-- Block Links -->
      <div class="block-links my-3">
         <a href="{{ route('admin.parking-slot.vehicles-data') }}">A</a>
         <a href="#">B</a>
         <a href="#">C</a>
         <a href="#">D</a>
         <a href="#">E</a>
         <a href="#">F</a>
         <a href="#">Office</a>
         <a href="#">All Blocks</a>
      </div>

      <!-- Export Buttons -->
      <div class="d-flex mb-3">
         <button class="btn btn-secondary me-2">PDF</button>
         <button class="btn btn-secondary me-2">Copy</button>
         <button class="btn btn-secondary me-2">Excel</button>
         <button class="btn btn-secondary me-2">CSV</button>
      </div>

      <!-- Table -->
      <div class="table-responsive">
         <table class="table table-bordered">
            <thead class="table-header">
               <tr>
                  <th>Slot No</th>
                  <th>Slot Name</th>
                  <th>Slot Type</th>
                  <th>Block</th>
                  <th>Unit No</th>
                  <th>Status</th>
                  <th>Name</th>
                  <th>Vehicle No</th>
                  <th>Vehicle Type</th>
                  <th>RFID No</th>
                  <th>From Date</th>
                  <th>To Date</th>
                  <th>Additional Field</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>1</td>
                  <td>Slot A1</td>
                  <td>Compact</td>
                  <td>A</td>
                  <td>101</td>
                  <td>Occupied</td>
                  <td>John Doe</td>
                  <td>AB123CD</td>
                  <td>Car</td>
                  <td>1234567890</td>
                  <td>01-09-2024</td>
                  <td>30-09-2024</td>
                  <td>Additional Info 1</td>
               </tr>
               <!-- More rows can be added here -->
            </tbody>
         </table>
      </div>
   </div>
@endsection

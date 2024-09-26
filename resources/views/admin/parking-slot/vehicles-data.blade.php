@extends('layouts.admin')
@section('title', 'Parking')
@section('content')
  <!-- Bootstrap CSS -->
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
  </style>

  <div class="container mt-4">
    <h3 class="mb-4">Vehicles</h3>

    <!-- Navigation Links -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.parking-slot.manage-vehicles') }}">All Vehicles</a>
      </li>
    </ul>

    <!-- Block Links -->
    <div class="block-links my-3">
      <a href="{{ route('admin.parking-slot.manage-vehicles') }}">A</a>
      <a href="#">B</a>
      <a href="#">C</a>
      <a href="#">D</a>
      <a href="#">E</a>
      <a href="#">F</a>
      <a href="#">Office</a>
      <a href="#">All Blocks</a>
    </div>

    <!-- Export Buttons -->
    <div class="mb-3">
      <button class="btn btn-secondary">PDF</button>
      <button class="btn btn-secondary">Copy</button>
      <button class="btn btn-secondary">Excel</button>
      <button class="btn btn-secondary">CSV</button>
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
          <tr>
            <td>2</td>
            <td>Slot A2</td>
            <td>Standard</td>
            <td>A</td>
            <td>102</td>
            <td>Free</td>
            <td>Jane Smith</td>
            <td>EF456GH</td>
            <td>Truck</td>
            <td>2345678901</td>
            <td>04-09-2024</td>
            <td>05-10-2024</td>
            <td>Additional Info 2</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Slot B1</td>
            <td>Large</td>
            <td>B</td>
            <td>201</td>
            <td>Occupied</td>
            <td>Michael Brown</td>
            <td>GH789IJ</td>
            <td>Motorcycle</td>
            <td>3456789012</td>
            <td>10-10-2024</td>
            <td>01-09-2024</td>
            <td>Additional Info 3</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Slot B2</td>
            <td>Compact</td>
            <td>B</td>
            <td>202</td>
            <td>Free</td>
            <td>Emily White</td>
            <td>IJ012KL</td>
            <td>Car</td>
            <td>4567890123</td>
            <td>14-09-2024</td>
            <td>15-10-2024</td>
            <td>Additional Info 4</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Slot C1</td>
            <td>Standard</td>
            <td>C</td>
            <td>301</td>
            <td>Occupied</td>
            <td>David Wilson</td>
            <td>KL345MN</td>
            <td>Van</td>
            <td>5678901234</td>
            <td>20-09-2024</td>
            <td>21-10-2024</td>
            <td>Additional Info 5</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
@endsection
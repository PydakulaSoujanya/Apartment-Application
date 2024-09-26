@extends('layouts.admin')

@section('content')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">

<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Flat Details</h1>
        <!-- Add Button -->
        <a href="{{ route('flatscreate') }}" class="btn btn-primary">Add Flat</a>
    </div>
    
    <table id="flatTable" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Block Name</th>
          <th>Floor No.</th>
          <th>Flat Number</th>
          <th>Flat Type</th>
          <th>Area (sq ft)</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- Block A Flats -->
        <tr>
          <td>Block A</td>
          <td>1</td>
          <td>101</td>
          <td>2BHK</td>
          <td>950</td>
          <td>Available</td>
        </tr>
        <tr>
          <td>Block A</td>
          <td>2</td>
          <td>202</td>
          <td>3BHK</td>
          <td>1250</td>
          <td>Available</td>
        </tr>
        <!-- Block B Flats -->
        <tr>
          <td>Block B</td>
          <td>1</td>
          <td>103</td>
          <td>2BHK</td>
          <td>980</td>
          <td>Not-Available</td>
        </tr>
        <tr>
          <td>Block B</td>
          <td>2</td>
          <td>204</td>
          <td>3BHK</td>
          <td>1350</td>
          <td>Not-Available</td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
</div>

<!-- jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function () {
    // Initialize DataTable with search and pagination
    $('#flatTable').DataTable({
      "paging": true,
      "searching": true,
      "lengthChange": false, // Remove the "Show entries" dropdown
      "pageLength": 5, // Default number of rows per page
      "dom": '<"top"f>t<"bottom"p><"clear">' // Moves pagination to the bottom-right
    });
  });
</script>

@endsection

@extends('layouts.admin')

@section('title', 'Projects & Meetings')

@section('content')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 30px;
    }
    .add-task-btn {
      float: right;
      margin-bottom: 20px;
    }
    .filters {
      margin-bottom: 15px;
    }
    .filters select {
      margin-right: 10px;
    }
    table {
      width: 100%;
      text-align: left;
      border-collapse: collapse;
    }
    table th, table td {
      padding: 10px;
      border: 1px solid #ddd;
    }
    table th {
      background-color: #d8e3f0;
    }
    .table-container {
      overflow-x: auto;
    }
    @media (max-width: 767px) {
      .filters, .btn-group {
        display: flex;
        flex-direction: column;
      }
    }
  </style>

  <div class="container">
    <!-- Page Heading -->
    <h2>Tasks</h2>

    <!-- Filters Row -->
    <div class="row filters">
      <div class="col-md-3">
        <select class="form-select">
          <option>All Categories</option>
          <option>Category 1</option>
          <option>Category 2</option>
        </select>
      </div>
      <div class="col-md-3">
        <select class="form-select">
          <option>All Users</option>
          <option>User 1</option>
          <option>User 2</option>
        </select>
      </div>
      <div class="col-md-3">
        <select class="form-select">
          <option>Open(0)</option>
          <option>Closed(0)</option>
          <option>Recurred(0)</option>
        </select>
      </div>
      <!-- Add Task Button -->
      <div class="col-md-3 text-end">
        <a href="{{ route('admin.projects.addtask') }}" class="btn btn-info add-task-btn">Add Task</a>
      </div>
    </div>

    <!-- Search Input -->
    <div class="row mt-3">
      <div class="col-md-4 offset-md-8 text-end">
        <label for="search">Search:</label>
        <input type="text" id="search" class="form-control" placeholder="Search tasks">
      </div>
    </div>

    <!-- Table -->
    <div class="table-container mt-3 pt-1">
      <table id="taskTable" class="table table-bordered pt-3">
        <thead>
          <tr>
            <th>Close Task</th>
            <th>Task ID</th>
            <th>Date</th>
            <th>Category</th>
            <th>Created By</th>
            <th>Assigned To</th>
            <th>Description</th>
            <th>Recurrence</th>
            <th>Due Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="checkbox"></td>
            <td>1</td>
            <td>2024-09-14</td>
            <td>Data Correction</td>
            <td>Admin</td>
            <td>Arun Kumar</td>
            <td>Fix data issues in project X</td>
            <td>Weekly</td>
            <td>2024-09-21</td>
            <td><button class="btn btn-danger btn-sm">Delete</button></td>
          </tr>
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
  </div>

  <!-- Add jQuery and DataTables Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>

  <!-- PDF and Excel Export Dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

  <script>
    $(document).ready(function() {
      // Initialize DataTables with buttons
      $('#taskTable').DataTable({
        dom: 'Bfrtip',  // Add buttons inside the table
        buttons: [
          {
            extend: 'pdfHtml5',
            text: 'PDF',
            className: 'btn btn-outline-secondary'
          },
          {
            extend: 'copyHtml5',
            text: 'Copy',
            className: 'btn btn-outline-secondary'
          },
          {
            extend: 'excelHtml5',
            text: 'Excel',
            className: 'btn btn-outline-secondary'
          },
          {
            extend: 'csvHtml5',
            text: 'CSV',
            className: 'btn btn-outline-secondary'
          },
          {
            extend: 'print',
            text: 'Print',
            className: 'btn btn-outline-secondary'
          }
        ]
      });
    });
  </script>
@endsection
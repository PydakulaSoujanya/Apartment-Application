@extends('layouts.admin')

@section('title', 'Projects & Meetings')

@section('content')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .custom-table th, .custom-table td {
      vertical-align: middle;
    }
    .search-section {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      flex-wrap: wrap;
    }
    .search-bar {
      display: flex;
      align-items: center;
      flex-wrap: nowrap;
      margin-bottom: 10px;
      flex-grow: 1;
    }
    .search-bar input {
      margin-right: 10px;
      flex-grow: 1;
    }
    .radio-options {
      display: flex;
      flex-wrap: nowrap;
      margin-top: 10px;
      justify-content: flex-start;
      flex-grow: 1;
    }
    .button-group {
      display: flex;
      justify-content: flex-end;
      width: 100%;
    }
    @media (max-width: 767px) {
      .search-section, .search-bar {
        flex-direction: column;
        align-items: flex-start;
      }
      .search-bar button {
        margin-top: 10px;
        width: 100%;
      }
      .search-bar {
        width: 100%;
      }
      .radio-options {
        justify-content: flex-start;
        width: 100%;
      }
      .button-group {
        justify-content: flex-start;
      }
    }
    .nav-tabs .nav-link.active {
      border-color: #007bff #007bff #fff;
    }
    .form-check-inline {
      margin-right: 10px;
    }
  </style>

  <div class="container my-4">
    <div class="row">
      <div class="col-12">
        <h3>Meetings</h3>
        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="#">Open</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Closed</a>
          </li>
        </ul>

        <!-- Search Section -->
        <div class="search-section mb-3">
          
            <div class="button-group">
    <a href="{{ route('admin.projects.createproject') }}" class="btn btn-success me-2">Create Project</a>
    <a href="{{ route('admin.projects.createmeeting') }}" class="btn btn-success">Create Meeting</a>
</div>

          <!-- Search Bar -->
          <div class="search-bar pt-3">
            <input type="text" class="form-control" placeholder="Search Meeting">
            <button class="btn btn-primary">Search</button>
          </div>
        </div>

        <!-- Radio Buttons Below the Search Bar -->
        <div class="radio-options">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="topic" value="topic" checked>
            <label class="form-check-label" for="topic">Topic</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="agenda" value="agenda">
            <label class="form-check-label" for="agenda">Agenda</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="minutes" value="minutes">
            <label class="form-check-label" for="minutes">Minutes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="resolution" value="resolution">
            <label class="form-check-label" for="resolution">Resolution</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="all" value="all">
            <label class="form-check-label" for="all">All</label>
          </div>
        </div>

        <!-- Responsive Table -->
        <div class="table-responsive">
          <table class="table table-striped custom-table">
            <thead class="bg-info text-white">
              <tr>
                <th>Meet. ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Initiated by</th>
                <th>Topic</th>
                <th>Attendees</th>
                <th>Invited</th>
                <th>Edit</th>
                <th>Invite</th>
                <th>Meeting Minutes</th>
              </tr>
            </thead>
            <tbody>
              <!-- Static Data for Meeting Records -->
              <tr>
                <td>001</td>
                <td>15/09/2024</td>
                <td>10:00 AM</td>
                <td>John Doe</td>
                <td>Annual Budget Review</td>
                <td>50</td>
                <td>60</td>
                <td><a href="#" class="btn btn-warning btn-sm">Edit</a></td>
                <td><a href="#" class="btn btn-info btn-sm">Invite</a></td>
                <td><a href="#" class="btn btn-primary btn-sm">View Minutes</a></td>
              </tr>
              <tr>
                <td>002</td>
                <td>18/09/2024</td>
                <td>2:00 PM</td>
                <td>Jane Smith</td>
                <td>Project Launch Discussion</td>
                <td>30</td>
                <td>40</td>
                <td><a href="#" class="btn btn-warning btn-sm">Edit</a></td>
                <td><a href="#" class="btn btn-info btn-sm">Invite</a></td>
                <td><a href="#" class="btn btn-primary btn-sm">View Minutes</a></td>
              </tr>
              <tr>
                <td>003</td>
                <td>20/09/2024</td>
                <td>11:00 AM</td>
                <td>Michael Johnson</td>
                <td>Strategy Meeting</td>
                <td>45</td>
                <td>50</td>
                <td><a href="#" class="btn btn-warning btn-sm">Edit</a></td>
                <td><a href="#" class="btn btn-info btn-sm">Invite</a></td>
                <td><a href="#" class="btn btn-primary btn-sm">View Minutes</a></td>
              </tr>
            </tbody>
          </table>
          <div class="button-group">
    <a href="{{ route('admin.projects.task') }}" class="btn btn-success me-2">View Tasks</a>
    
</div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection

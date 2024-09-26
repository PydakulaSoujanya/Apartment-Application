@extends('layouts.admin')

@section('title', 'Projects & Meetings')

@section('content')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
      max-width: 800px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-label {
      font-weight: bold;
    }
    .form-control, .form-select {
      margin-bottom: 15px;
    }
    .card-header {
      background-color: #005580;
      color: white;
      padding: 15px;
      font-size: 18px;
      border-radius: 8px 8px 0 0;
    }
    .card-footer {
      background-color: #f8f9fa;
      border-top: none;
      padding: 10px;
      display: flex;
      justify-content: space-between; /* Add this to align buttons on both sides */
    }
    .add-task-btn {
      background-color: #17a2b8;
      color: white;
    }
    .close-btn {
      background-color: #dc3545;
      color: white;
    }
    /* Hide frequency options initially */
    #frequencyOptions {
      display: none;
    }
  </style>


  <div class="container">
    <div class="card">
      <div class="card-header">
        Add Task
      </div>
      <div class="card-body">
        <form>
          <div class="row">
            <div class="col-md-12">
              <label for="task" class="form-label">Task</label>
              <input type="text" id="task" class="form-control" placeholder="Task Description">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="assignTo" class="form-label">Assign To</label>
              <select id="assignTo" class="form-select">
                <option>Arun Kumar - Office</option>
                <!-- Add more options here -->
              </select>
            </div>
            <div class="col-md-6">
              <label for="category" class="form-label">Category</label>
              <select id="category" class="form-select">
                <option>Data Correction</option>
                <!-- Add more options here -->
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <label for="beginOn" class="form-label">Begin On</label>
              <input type="date" id="beginOn" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="dueOn" class="form-label">Due On</label>
              <input type="date" id="dueOn" class="form-control">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="recur">
                <label class="form-check-label" for="recur">Recur</label>
              </div>
            </div>
          </div>

          <!-- Frequency options (hidden initially) -->
          <div class="row mt-2" id="frequencyOptions">
            <div class="col-md-12">
              <label class="form-label">Frequency</label>
              <div class="d-flex align-items-center">
                <div class="form-check me-3">
                  <input class="form-check-input" type="radio" name="frequency" id="daily" checked>
                  <label class="form-check-label" for="daily">Daily</label>
                </div>
                <div class="form-check me-3">
                  <input class="form-check-input" type="radio" name="frequency" id="weekly">
                  <label class="form-check-label" for="weekly">Week</label>
                </div>
                <div class="form-check me-3">
                  <input class="form-check-input" type="radio" name="frequency" id="monthly">
                  <label class="form-check-label" for="monthly">Month</label>
                </div>
                <div class="form-check me-3">
                  <input class="form-check-input" type="radio" name="frequency" id="twoMonths">
                  <label class="form-check-label" for="twoMonths">2 Months</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="frequency" id="quarterly">
                  <label class="form-check-label" for="quarterly">Quarterly</label>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn add-task-btn">Add Task</button>
        <button type="button" class="btn close-btn">Close</button>
      </div>
    </div>

    <p class="mt-3 text-center">Can also be accessed via Admin's Dashboard -> Projects, Meetings, Tasks.</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // JavaScript to toggle frequency options visibility
    const recurCheckbox = document.getElementById('recur');
    const frequencyOptions = document.getElementById('frequencyOptions');

    recurCheckbox.addEventListener('change', function () {
      if (this.checked) {
        frequencyOptions.style.display = 'block';
      } else {
        frequencyOptions.style.display = 'none';
      }
    });
  </script>
@endsection

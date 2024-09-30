@extends('layouts.admin')

@section('title', 'Projects & Meetings')

@section('content')
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project-1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f8f8;
    }
    .container {
      margin-top: 30px;
    }
    .form-label {
      font-weight: bold;
    }
    .save-btn {
      margin-top: 15px;
    }
    .note-box {
      margin-top: 20px;
    }
  </style>

  <div class="container">
    <h2 class="text-center">Project-1</h2>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
      @csrf  <!-- CSRF token for security -->

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="category" class="form-label">Category:</label>
        </div>
        <div class="col-md-8">
          <input type="text" name="category" id="category" class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="topic" class="form-label">Topic:</label>
        </div>
        <div class="col-md-8">
          <input type="text" name="topic" id="topic" class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="status" class="form-label">Status:</label>
        </div>
        <div class="col-md-8">
          <select name="status" id="status" class="form-control" required>
            <option value="Open">Open</option>
            <option value="In Progress">In Progress</option>
            <option value="Closed">Closed</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="priority" class="form-label">Priority:</label>
        </div>
        <div class="col-md-8">
          <select name="priority" id="priority" class="form-control" required>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="driven_by" class="form-label">Driven By:</label>
        </div>
        <div class="col-md-8">
          <input type="text" name="driven_by" id="driven_by" class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="target_date" class="form-label">Target Date:</label>
        </div>
        <div class="col-md-8">
          <input type="date" name="target_date" id="target_date" class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="attachment" class="form-label">Attachment:</label>
        </div>
        <div class="col-md-8">
          <input type="file" name="attachment" id="attachment" class="form-control">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="note" class="form-label">Note:</label>
        </div>
        <div class="col-md-8">
          <textarea name="note" id="note" class="form-control" rows="3"></textarea>
        </div>
      </div>

      <div class="text-center save-btn">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>

    @if ($errors->any())
      <div class="alert alert-danger mt-3">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection

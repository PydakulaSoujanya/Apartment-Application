@extends('layouts.admin')

@section('title', 'Projects&Meetings')

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
    .form-control, .form-select {
      margin-bottom: 15px;
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
    
    <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" name="category" id="category" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="topic">Topic:</label>
        <input type="text" name="topic" id="topic" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" id="status" class="form-control" required>
            <option value="Open">Open</option>
            <option value="In Progress">In Progress</option>
            <option value="Closed">Closed</option>
        </select>
    </div>

    <div class="form-group">
        <label for="priority">Priority:</label>
        <select name="priority" id="priority" class="form-control" required>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
    </div>

    <div class="form-group">
        <label for="driven_by">Driven By:</label>
        <input type="text" name="driven_by" id="driven_by" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="target_date">Target Date:</label>
        <input type="date" name="target_date" id="target_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="attachment">Attachment:</label>
        <input type="file" name="attachment" id="attachment" class="form-control">
    </div>

    <div class="form-group">
        <label for="note">Note:</label>
        <textarea name="note" id="note" class="form-control"></textarea>
    </div>

    <div class="button-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
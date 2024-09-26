<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry Pass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Adjust font size for labels and input fields */
        label, input, textarea, button {
            font-size: 14px;
        }

        #pass-card {
            margin-left: 80px;
        }
    </style>
</head>
<body>
@extends('layouts.resident')

<!-- @extends('layout') -->
<div class="container mt-5">
    <div class="card" id="pass-card">
        <div class="card-header">
            <h5>Edit Entry Pass</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('resident.entry-passes.update', $entryPass->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- First Row of Fields -->
                <div class="row">
                    <!-- Category Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" class="form-control" value="{{ $entryPass->category }}" required>
                        </div>
                    </div>

                    <!-- Visitor Name Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="visitor_name">Visitor Name</label>
                            <input type="text" name="visitor_name" id="visitor_name" class="form-control" value="{{ $entryPass->visitor_name }}" required>
                        </div>
                    </div>
                </div>

                <!-- Second Row of Fields -->
                <div class="row mt-3">
                    <!-- Phone Number Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $entryPass->phone_number }}" required>
                        </div>
                    </div>

                    <!-- Address Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ $entryPass->address }}" required>
                        </div>
                    </div>
                </div>

                <!-- Third Row of Fields -->
                <div class="row mt-3">
                    <!-- From Date Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="from_date">From Date</label>
                            <input type="date" name="from_date" id="from_date" class="form-control" value="{{ $entryPass->from_date }}" required>
                        </div>
                    </div>

                    <!-- To Date Field -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="to_date">To Date</label>
                            <input type="date" name="to_date" id="to_date" class="form-control" value="{{ $entryPass->to_date }}" required>
                        </div>
                    </div>
                </div>

                <!-- Pass Description Field -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pass_description">Pass Description</label>
                            <textarea name="pass_description" id="pass_description" class="form-control" required>{{ $entryPass->pass_description }}</textarea>
                        </div>
                    </div>
                </div>
               
                <!-- Update Button -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update Pass</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Success Message -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Error Messages -->
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Confirmation Alert Before Submission -->
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        var confirmation = confirm('Updated Successfully');
        if (!confirmation) {
            event.preventDefault(); // Prevent form submission if the user cancels
        }
    });
</script>

</body>
</html>

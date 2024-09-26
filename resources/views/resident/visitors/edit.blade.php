<!DOCTYPE html>
<html>
<head>
    <title>Edit Visitor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #pass-card {
            margin-left: 80px;

        }

         .card-body, 
        #resident_name, 
        #visiting_date,
        .form-control, 
        label, 
        button {
            font-size: 14px;
        }

        input.form-control {
            font-size: 14px;
        }
    </style>
</head>
<body>
@extends('layouts.resident')
<div class="container">
    <div class="card mt-5" id="pass-card">
        <div class="card-header">
            <h5>Edit Visitor</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('resident.visitors.update', $visitor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="flat_number">Flat Number</label>
                        <input type="text" class="form-control" id="flat_number" name="flat_number" value="{{ $visitor->flat_number }}" required readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="resident_name">Resident Name</label>
                        <input type="text" class="form-control" id="resident_name" name="resident_name" value="{{ $visitor->resident_name }}" required readonly>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="visitor_name">Visitor Name</label>
                        <input type="text" class="form-control" id="visitor_name" name="visitor_name" value="{{ $visitor->visitor_name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="visitor_number">Visitor PhoneNumber</label>
                        <input type="text" class="form-control" id="visitor_number" name="visitor_number" value="{{ $visitor->visitor_number }}" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="visiting_reason">Visiting Reason</label>
                        <input type="text" class="form-control" id="visiting_reason" name="visiting_reason" value="{{ $visitor->visiting_reason }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="visiting_date">Visiting Date</label>
                        <input type="date" class="form-control" id="visiting_date" name="visiting_date" value="{{ $visitor->visiting_date }}" required>
                    </div>
                </div><br>

                <div class="form-group">
                    <label for="start_time">Expected Timings</label>
                    <div class="row">
                        <div class="col">
                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $visitor->start_time }}" required>
                        </div>
                        <div class="col">
                            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $visitor->end_time }}" required>
                        </div>
                    </div>
                </div><br>

                <button type="submit" class="btn btn-primary">Update Visitor</button>
            </form>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

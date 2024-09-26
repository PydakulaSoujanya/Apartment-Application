<!DOCTYPE html>
<html>
<head>
    <title>Visitor Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .card{
        width:50%;
    }
    .container h3{
        margin-left:70px;
    }
    .card{
        margin-left:70px;
    }
</style>
<body>
@extends('layouts.resident')
<div class="container mt-5">
    <h3>Visitor Details</h3>
    <div class="card justify-content-between align-items-center">
        <div class="card-body">
            <p class="card-title"><b>Flat Number</b>: {{ $visitor->flat_number }}</p>
            <p class="card-title"><b>Resident Name</b>: {{ $visitor->resident_name }}</p>
            <p class="card-title"><b>Visitor Name</b>: {{ $visitor->visitor_name }}</p>
            <p class="card-text"><b>Visitor PhoneNumber</b>: {{ $visitor->visitor_number }}</p>
            <p class="card-text"><b>Visiting Reason</b>: {{ $visitor->visiting_reason }}</p>
            <p class="card-text"><b>Visiting Date</b>: {{ $visitor->visiting_date }}</p>
            <p class="card-text"><b>Expected Timings</b>: {{ $visitor->start_time }}  tob {{ $visitor->end_time }}</p>
          
            <a href="{{ route('resident.visitors.index') }}" class="btn btn-dark">Back to Visitors</a>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

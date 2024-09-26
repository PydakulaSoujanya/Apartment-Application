<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Entry Pass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.resident')

<!-- @extends('layout') -->
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Entry Pass Details</h4>
        </div>
        <div class="card-body">
            <p><strong>Category:</strong> {{ $entryPass->category }}</p>
            <p><strong>Visitor Name:</strong> {{ $entryPass->visitor_name }}</p>
            <p><strong>Phone Number:</strong> {{ $entryPass->phone_number }}</p>
            <p><strong>Address:</strong> {{ $entryPass->address }}</p>
            <!-- <p><strong>Apartment No.:</strong> {{ $entryPass->apartment_no }}</p>
            <p><strong>Floor/Wing:</strong> {{ $entryPass->floor_wing }}</p> -->
            <p><strong>From Date:</strong> {{ $entryPass->from_date }}</p>
            <p><strong>To Date:</strong> {{ $entryPass->to_date }}</p>
            <p><strong>Pass Description:</strong> {{ $entryPass->pass_description }}</p>

            <form action="{{ route('resident.entry-passes.destroy', $entryPass->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <!-- <button type="submit" class="btn btn-danger">Delete Pass</button> -->
            </form>
            
            <a href="{{ route('resident.entry-passes.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

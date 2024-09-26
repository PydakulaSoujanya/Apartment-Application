@extends('layouts.admin')

@section('title', 'Add Staff')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Staff Details</h2>
            </div>
            <div class="card-body">
                <p><strong>S.No:</strong> {{ $staff->sno }}</p>
                <p><strong>Name:</strong> {{ $staff->name }}</p>
                <p><strong>Category:</strong> {{ $staff->category }}</p>
                <p><strong>Gender:</strong> {{ $staff->gender }}</p>
                <p><strong>Contact:</strong> {{ $staff->contact }}</p>
                <p><strong>Email:</strong> {{ $staff->email }}</p>
                <p><strong>Languages:</strong> {{ $staff->languages }}</p>
                <p><strong>Doj:</strong> {{ $staff->doj }}</p>
                <p><strong>Aadhar Number:</strong> {{ $staff->aadhar }}</p>
                <p><strong>Status:</strong> {{ $staff->status }}</p>

                <a href="{{ route('admin.staff.view-staff') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Add Staff')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2>Edit Staff</h2>
            <a href="{{ route('admin.staff.view-staff') }}" class="btn btn-primary">Staff Details</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name and Category Row -->
                <div class="row">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" id="name" name="name" class="form-control" value="{{ $staff->name }}" required>
                    </div>

                    <div class="col-md-2">
                        <label for="category" class="form-label">Category</label>
                    </div>
                    <div class="col-md-4 mb-3 d-flex">
                      
                    <input type="text" id="category" name="category" class="form-control" value="{{ $staff->category }}" required>
                    </div>
                </div>

    



                <!-- Gender and Contact Row -->
                <div class="row">
                    <div class="col-md-2">
                        <label for="gender" class="form-label">Gender</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male" {{ $staff->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $staff->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $staff->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="contact" class="form-label">Contact</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" id="contact" name="contact" class="form-control" value="{{ $staff->contact }}" required>
                    </div>
                </div>

                <!-- Email and Known Languages Row -->
                <div class="row">
                    <div class="col-md-2">
                        <label for="email" class="form-label">Email Id</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="email" id="email" name="email" class="form-control" value="{{ $staff->email }}" required>
                    </div>

                    <div class="col-md-2">
                        <label for="languages" class="form-label">Known Languages</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" id="languages" name="languages" class="form-control" value="{{ $staff->languages }}" required>
                    </div>
                </div>

                <!-- Date of Joining and Aadhar Number Row -->
                <div class="row">
                    <div class="col-md-2">
                        <label for="doj" class="form-label">Date of Joining</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="date" id="doj" name="doj" class="form-control" value="{{ $staff->doj }}" required>
                    </div>

                    <div class="col-md-2">
                        <label for="aadhar" class="form-label">Aadhar Number</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" id="aadhar" name="aadhar" class="form-control" value="{{ $staff->aadhar }}" required>
                    </div>
                </div>

                <!-- Status Row -->
                <div class="row">
                    <div class="col-md-2">
                        <label for="status" class="form-label">Status</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <select id="status" name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="Active" {{ $staff->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ $staff->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button Row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.staff.view-staff') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

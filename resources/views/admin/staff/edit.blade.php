@extends('layouts.admin')

@section('title', 'Add Staff')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Edit Staff</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Row 1: Name and Category -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $staff->name }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category">Category</label>
                            <input type="text" id="category" name="category" class="form-control" value="{{ $staff->category }}" required>
                        </div>
                    </div>

                    <!-- Row 2: Gender and Contact -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ $staff->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $staff->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ $staff->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control" value="{{ $staff->contact }}" required>
                        </div>
                    </div>

                    <!-- Row 3: Email and Known Languages -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email">Email Id</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $staff->email }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="languages">Known Languages</label>
                            <input type="text" id="languages" name="languages" class="form-control" value="{{ $staff->languages }}" required>
                        </div>
                    </div>

                    <!-- Row 4: Doj and Aadhar Number -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="doj">Doj</label>
                            <input type="date" id="doj" name="doj" class="form-control" value="{{ $staff->doj }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="aadhar">Aadhar Number</label>
                            <input type="text" id="aadhar" name="aadhar" class="form-control" value="{{ $staff->aadhar }}" required>
                        </div>
                    </div>

                    <!-- Row 5: Status -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="Active" {{ $staff->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $staff->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
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

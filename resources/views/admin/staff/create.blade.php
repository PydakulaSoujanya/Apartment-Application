@extends('layouts.admin')

@section('title', 'Add Staff')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Add Staff</h2>
                <a href="{{ route('admin.staff.view-staff') }}" class="btn btn-primary">Staff Details</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.staff.store') }}" method="POST">
                    @csrf
                    <!-- Form Fields -->

                    <!-- Row 1: Name and Category -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-5 mb-3">
    <label for="category">Category</label>
    <select id="category" name="category" class="form-control" required>
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-1 mb-3 d-flex align-items-end">
        <!-- + Button to open modal -->
        <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            +
        </button> -->
        <a href="{{ route('admin.categories.index') }}" class="btn btn-success">+</a>

    </div>

                    </div>

                    <!-- Row 2: Gender and Contact -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control" required>
                        </div>
                    </div>

                    <!-- Row 3: Email and Known Languages -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email">Email Id</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="languages">Known Languages</label>
                            <input type="text" id="languages" name="languages" class="form-control" required>
                        </div>
                    </div>

                    <!-- Row 4: Date of Joining (DOJ) and Aadhar Number -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="doj">Date of Joining</label>
                            <input type="date" id="doj" name="doj" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="aadhar">Aadhar Number</label>
                            <input type="text" id="aadhar" name="aadhar" class="form-control" required>
                        </div>
                    </div>

                    <!-- Row 5: Status -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button and Back Button -->
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

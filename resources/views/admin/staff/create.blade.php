@extends('layouts.admin')

@section('title', 'Add Staff')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8"> <!-- Increased form width -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Add Staff</h2>
                        <a href="{{ route('admin.staff.view-staff') }}" class="btn btn-primary">Staff Details</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.staff.store') }}" method="POST">
                            @csrf

                            <!-- Row 1: Name -->
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>

                            <!-- Row 2: Category -->
                            <div class="mb-3 row">
                                <label for="category" class="col-sm-4 col-form-label">Category</label>
                                <div class="col-sm-8 d-flex">
                                    <select id="category" name="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-success ms-2">+</a>
                                </div>
                            </div>

                            <!-- Row 3: Gender -->
                            <div class="mb-3 row">
                                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                                <div class="col-sm-8">
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 4: Contact -->
                            <div class="mb-3 row">
                                <label for="contact" class="col-sm-4 col-form-label">Contact</label>
                                <div class="col-sm-8">
                                    <input type="text" id="contact" name="contact" class="form-control" required>
                                </div>
                            </div>

                            <!-- Row 5: Email -->
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-4 col-form-label">Email Id</label>
                                <div class="col-sm-8">
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <!-- Row 6: Known Languages -->
                            <div class="mb-3 row">
                                <label for="languages" class="col-sm-4 col-form-label">Known Languages</label>
                                <div class="col-sm-8">
                                    <input type="text" id="languages" name="languages" class="form-control" required>
                                </div>
                            </div>

                            <!-- Row 7: Date of Joining (DOJ) -->
                            <div class="mb-3 row">
                                <label for="doj" class="col-sm-4 col-form-label">Date of Joining</label>
                                <div class="col-sm-8">
                                    <input type="date" id="doj" name="doj" class="form-control" required>
                                </div>
                            </div>

                            <!-- Row 8: Aadhar Number -->
                            <div class="mb-3 row">
                                <label for="aadhar" class="col-sm-4 col-form-label">Aadhar Number</label>
                                <div class="col-sm-8">
                                    <input type="text" id="aadhar" name="aadhar" class="form-control" required>
                                </div>
                            </div>

                            <!-- Row 9: Status -->
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button and Back Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.staff.view-staff') }}" class="btn btn-secondary">Back</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

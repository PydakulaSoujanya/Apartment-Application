
<style>
    #pass-card{
margin-left:58px;
    }

    .card-body{
        font-size:14px;
    }

    #from_date, #to_date{
        font-size:14px;
    }
    .form-select{
        font-size:14px;
    }
</style>

<!-- <body> -->
@extends('layouts.resident')

@section('title', 'View Entry Passes')

@section('content')

<div class="container mt-5">
    <div class="card" id="pass-card">
        <div class="card-header">
            <h5>Create New Pass</h5>
        </div>
        <div class="card-body">
        <form action="{{ route('resident.entry-passes.store') }}" method="POST">
                @csrf

                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" name="category" class="form-select" required>
                            <option value="">Select Category</option>
                            <option value="Visitor">Visitor</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Service">Service</option>
                            <option value="Contractor">Contractor</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="visitor_name" class="form-label">Visitor Name</label>
                        <input type="text" id="visitor_name" name="visitor_name" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="from_date" class="form-label">From Date</label>
                        <input type="date" id="from_date" name="from_date" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="to_date" class="form-label">To Date</label>
                        <input type="date" id="to_date" name="to_date" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="pass_description" class="form-label">Pass Description</label>
                    <textarea id="pass_description" name="pass_description" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection

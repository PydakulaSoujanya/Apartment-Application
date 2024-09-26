<style>
    #pass-card {
        margin-top: 30px;
        margin-left: auto;
        margin-right: auto;
        max-width: 800px; /* Adjusted the max-width for better layout */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added a subtle shadow for better appearance */
        border-radius: 10px;
    }

    .card-header {
        background-color: rgb(220, 226, 249);
        color: white;
        border-radius: 10px 10px 0 0; 
    }

    .card-header h5 {
        margin-bottom: 0;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 8px; /* Slightly rounded inputs */
    }

    .form-group {
        margin-bottom: 1.5rem; /* Increase spacing between form groups */
    }

    .btn-primary {
        width: 20%;
        padding: 15px;
        font-size: 16px;
        border-radius:10px;
        /* margin-left:39%; */
        display: flex;
       justify-content: row;
       align-items: center;
    }
   
</style>

@extends('layouts.resident')

@section('title', 'Visitors')

@section('content')
<div class="container">
    <div class="card" id="pass-card">
        <div class="card-header">
            <h5>Create Visitor</h5>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card-body">
            <form action="{{ route('resident.visitors.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="flat_number">Flat Number</label>
                        <input type="text" class="form-control" id="flat_number" name="flat_number" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="resident_name">Resident Name</label>
                        <input type="text" class="form-control" id="resident_name" name="resident_name" value="{{ $resident_name }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="visitor_name">Visitor Name</label>
                        <input type="text" class="form-control" id="visitor_name" name="visitor_name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="visitor_email">Visitor Email</label>
                        <input type="email" class="form-control" id="visitor_email" name="visitor_email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="visitor_number">Visitor Phone Number</label>
                        <input type="text" class="form-control" id="visitor_number" name="visitor_number" required>
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label for="visiting_date">Visiting Date</label>
                        <input type="date" class="form-control" id="visiting_date" name="visiting_date" required>
                    </div> -->
                   
    <div class="form-group col-md-6">
        <label for="visiting_date">Visiting Date</label>
        <input type="date" class="form-control" id="visiting_date" name="visiting_date" required>
    </div>
                </div>

                <div class="form-group">
                    <label for="visiting_reason">Visiting Reason</label>
                    <textarea class="form-control" id="visiting_reason" name="visiting_reason" rows="4" required></textarea>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="start_time">Start Time</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_time">End Time</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ">Create Visitor</button>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        // Get today's date
        var today = new Date();
        // Format the date to yyyy-mm-dd
        var formattedDate = today.toISOString().split('T')[0];
        // Set the default value of the visiting_date input to today's date
        document.getElementById('visiting_date').value = formattedDate;
    });
</script>
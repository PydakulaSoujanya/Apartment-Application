@extends('layouts.admin')

@section('title', 'Add New Activity')

@section('content')
<div class="container">
    <div class="card" id="activity-card">
        <div class="d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0">Add New Activity</h5>
            <a href="{{ route('admin.activities.index') }}" class="btn btn-primary mt-2">Activities List</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card-body">
            <form action="" method="POST">
                @csrf <!-- CSRF Token for security -->
                
                <!-- Activity Name -->
                <div class="form-group">
                    <label for="activityName">Activity Name</label>
                    <input type="text" class="form-control" id="activityName" name="activity_name" placeholder="Enter activity name" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter activity description" required></textarea>
                </div>

                <!-- Activity Date -->
                <div class="form-group">
                    <label for="activityDate">Activity Date</label>
                    <input type="date" class="form-control" id="activityDate" name="activity_date" required>
                </div>

                <!-- Charge Per Participant -->
                <div class="form-group">
                    <label for="chargePerParticipant">Charge Per Participant</label>
                    <input type="number" class="form-control" id="chargePerParticipant" name="charge_per_participant" placeholder="Enter charge per participant (e.g., 500)" required>
                </div>

                <!-- Maximum Participants -->
                <div class="form-group">
                    <label for="maxParticipants">Maximum Participants</label>
                    <input type="number" class="form-control" id="maxParticipants" name="max_participants" placeholder="Enter maximum number of participants" required>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Add Activity</button>
            </form>
        </div>
    </div>
</div>
@endsection

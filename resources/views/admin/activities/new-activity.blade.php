@extends('layouts.admin')

@section('title', 'Add New Activity')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9"> 
            <div class="card" id="activity-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Add New Activity') }}</h5>
                    <a href="{{ route('admin.activities.index') }}" class="btn btn-primary">{{ __('Activities List') }}</a>
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
                        <div class="form-group row mb-3">
                            <label for="activityName" class="col-md-4 col-form-label text-md-right">Activity Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="activityName" name="activity_name" placeholder="Enter activity name" required>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter activity description" required></textarea>
                            </div>
                        </div>

                        <!-- Activity Date -->
                        <div class="form-group row mb-3">
                            <label for="activityDate" class="col-md-4 col-form-label text-md-right">Activity Date</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="activityDate" name="activity_date" required>
                            </div>
                        </div>

                        <!-- Charge Per Participant -->
                        <div class="form-group row mb-3">
                            <label for="chargePerParticipant" class="col-md-4 col-form-label text-md-right">Charge Per Participant</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" id="chargePerParticipant" name="charge_per_participant" placeholder="Enter charge per participant (e.g., 500)" required>
                            </div>
                        </div>

                        <!-- Maximum Participants -->
                        <div class="form-group row mb-3">
                            <label for="maxParticipants" class="col-md-4 col-form-label text-md-right">Maximum Participants</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" id="maxParticipants" name="max_participants" placeholder="Enter maximum number of participants" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                        <div class="col-md-12 text-center">
    <button type="submit" class="btn btn-primary mt-2">Add Activity</button>
    <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary mt-2">Close</a>
</div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

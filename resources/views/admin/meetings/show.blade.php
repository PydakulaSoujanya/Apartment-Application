@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Meeting Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Brief Topic: {{ $meeting->brief_topic }}</h5>
            <p class="card-text"><strong>Date:</strong> {{ $meeting->date }}</p>
            <p class="card-text"><strong>Time:</strong> {{ $meeting->time }}</p>
            <p class="card-text"><strong>Duration:</strong> {{ $meeting->duration }}</p>
            <p class="card-text"><strong>Venue:</strong> {{ $meeting->venue }}</p>
            <p class="card-text"><strong>Notes:</strong> {{ $meeting->notes }}</p>
            <p class="card-text"><strong>Attendees:</strong> {{ $meeting->attendees }}</p>
            <p class="card-text"><strong>Alert:</strong> {{ implode(', ', $meeting->alert) }}</p>

            <a href="{{ route('admin.meetings.index') }}" class="btn btn-secondary">Back to Meetings List</a>
        </div>
    </div>
</div>
@endsection

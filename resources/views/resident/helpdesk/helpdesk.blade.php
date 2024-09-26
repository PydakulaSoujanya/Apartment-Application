@extends('layouts.resident')

@section('title', 'Help Desk Requests')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Help Desk Requests</h1>

<!-- Add Request Button -->
<div class="mb-3">
    <a href="{{ route('submit.request.form') }}" class="btn btn-primary">+ Add Request</a>
</div>

<!-- Display the requests -->
@foreach($requests as $request)
    <div class="card mt-3">
        <div class="card-header">
            <span class="badge badge-light">{{ $request->id }}</span> {{ $request->request_title }}
            <span class="badge badge-warning">{{ $request->status }}</span>
        </div>
        <div class="card-body">
            <p>{{ $request->description }}</p>
            <p><strong>Category:</strong> {{ $request->category }}</p>
            <p><strong>Office:</strong> {{ $request->office }}</p>
            <p><strong>Preferred Date:</strong> {{ $request->preferred_date }}</p>
            <p><strong>Urgent:</strong> {{ $request->urgent ? 'Yes' : 'No' }}</p>
            @if($request->attachments)
                <p><strong>Attachments:</strong></p>
                <ul>
                    @foreach(json_decode($request->attachments) as $attachment)
                        <li><a href="{{ asset('storage/' . $attachment) }}" target="_blank">View Attachment</a></li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="card-footer">
            <small>Submitted on {{ $request->created_at }}</small>
        </div>
    </div>
@endforeach
@endsection

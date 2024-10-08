@extends('layouts.resident')

@section('title', 'Help Desk Requests')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <div style="position: relative;">
        <h2>Help Desk Requests</h2>
        <a href="{{ route('submit.request.form') }}" class="btn btn-primary rounded-circle shadow-lg">
            <i class="fas fa-plus" style="font-size: 1.5rem;"></i>
        </a>
    </div>

    <div class="input-group" style="max-width: 500px;">
        <input type="text" class="form-control" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Filter by: Community Requests</button>
            <button class="btn btn-outline-secondary" type="button">Sort by</button>
        </div>
    </div>
</div>

@foreach($requests as $request)
<div class="card mt-3 shadow-sm mx-auto" style="max-width: 800px;">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <span class="badge badge-pill badge-secondary mr-2">{{ $request->id }}</span>
                <h5 class="card-title">{{ $request->request_title }}</h5>
                @if($request->status == 'new')
                    <span class="badge badge-danger ml-2">NEW</span>
                @endif
            </div>
            <div class="ml-auto text-right">
                <small class="text-muted">Opened: {{ $request->created_at->format('d-M-Y') }}</small><br>
                <small class="text-muted">Updated: {{ $request->updated_at->format('d-M-Y') }}</small>
            </div>
        </div>

        <p class="card-text text-muted mb-2">By {{ $request->submitted_by }} | {{ $request->category }} | {{ $request->office }}</p>
        <p>{{ $request->description }}</p>

        @if($request->attachments)
            <p><strong>Attachments:</strong></p>
            <div class="attachment-list">
                @foreach(explode(',', $request->attachments) as $attachment)
                    <a href="{{ asset('helpdesk/' . $attachment) }}" target="_blank">{{ $attachment }}</a>
                    @if(!$loop->last)
                        <span>, </span>
                    @endif
                @endforeach
            </div>
        @else
            <p>No file uploaded</p>
        @endif

        <!-- Status Update Button -->
        <div class="d-flex justify-content-end mt-3">
            <form action="{{ route('requests.updateStatus', $request->id) }}" method="POST" class="mr-2">
                @csrf
                @method('PUT')
                <button type="submit" class="btn {{ $request->status == 'Completed' ? 'btn-success' : 'btn-warning' }}">
                    {{ $request->status == 'Completed' ? 'Completed' : 'In Progress' }}
                </button>
            </form>

            <!-- Edit Icon -->
            <a href="{{ route('requests.edit', $request->id) }}" class="text-primary mx-2" title="Edit">
                <i class="fas fa-edit fa-lg"></i>
            </a>

            <!-- Delete Icon -->
            <form action="{{ route('requests.destroy', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this request?');" class="ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link p-0 text-danger" title="Delete">
                    <i class="fas fa-trash-alt fa-lg"></i>
                </button>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- FontAwesome Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

@endsection

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Project Details</h1>
    <p><strong>Category:</strong> {{ $project->category }}</p>
    <p><strong>Topic:</strong> {{ $project->topic }}</p>
    <p><strong>Status:</strong> {{ $project->status }}</p>
    <p><strong>Priority:</strong> {{ $project->priority }}</p>
    <p><strong>Driven By:</strong> {{ $project->driven_by }}</p>
    <p><strong>Target Date:</strong> {{ $project->target_date->format('d/m/Y') }}</p>
    <p><strong>Notes:</strong> {{ $project->note }}</p>
    
    @if($project->file_path)
        <p><strong>Attachment:</strong> <a href="{{ asset('storage/' . $project->file_path) }}">Download</a></p>
    @endif

    <!-- Close button -->
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Close</a>
</div>
@endsection

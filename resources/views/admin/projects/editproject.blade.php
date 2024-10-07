@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Project</h1>
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" class="form-control" value="{{ $project->category }}" required>
        </div>

        <div class="form-group">
            <label for="topic">Topic</label>
            <input type="text" name="topic" class="form-control" value="{{ $project->topic }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" value="{{ $project->status }}" required>
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <input type="text" name="priority" class="form-control" value="{{ $project->priority }}" required>
        </div>

        <div class="form-group">
            <label for="driven_by">Driven By</label>
            <input type="text" name="driven_by" class="form-control" value="{{ $project->driven_by }}" required>
        </div>

        <div class="form-group">
            <label for="target_date">Target Date</label>
            <input type="date" name="target_date" class="form-control" value="{{ $project->target_date->format('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="attachment">Attachment</label>
            <input type="file" name="attachment" class="form-control">
        </div>

        <div class="form-group">
            <label for="note">Notes</label>
            <textarea name="note" class="form-control">{{ $project->note }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Project</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Close</a>
    </form>
</div>
@endsection

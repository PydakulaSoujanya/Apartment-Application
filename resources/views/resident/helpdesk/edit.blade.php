@extends('layouts.resident')

@section('title', 'Edit Help Desk Request')

@section('content')
<div class="container mt-5">
    <h2>Edit Help Desk Request</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('requests.update', $request->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="request_title">Request Title</label>
            <input type="text" class="form-control" name="request_title" value="{{ old('request_title', $request->request_title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="4" required>{{ old('description', $request->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="office">Office</label>
            <input type="text" class="form-control" name="office" value="{{ old('office', $request->office) }}">
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" name="category" value="{{ old('category', $request->category) }}" required>
        </div>

        <div class="form-group">
            <label for="preferred_date">Preferred Date</label>
            <input type="date" class="form-control" name="preferred_date" value="{{ old('preferred_date', $request->preferred_date) }}">
        </div>

        <div class="form-group">
            <label for="urgent">Urgent</label>
            <input type="checkbox" name="urgent" {{ $request->urgent ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="attachments">Attachments</label>
            <input type="file" class="form-control-file" name="attachments[]" multiple>
            <small class="form-text text-muted">Current: @foreach(explode(',', $request->attachments) as $attachment) 
                <a href="{{ asset('helpdesk/' . $attachment) }}" target="_blank">{{ $attachment }}</a>
            @endforeach</small>
        </div>

        <button type="submit" class="btn btn-primary">Update Request</button>
    </form>
</div>
@endsection

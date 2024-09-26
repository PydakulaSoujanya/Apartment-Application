@extends('layouts.resident')

@section('title', 'Create Help Desk Request')

@section('content')
<h1>Create Help Desk Request</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('submit.request') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="request_title">Request Title</label>
        <input type="text" class="form-control" id="request_title" name="request_title" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>

    <div class="form-group">
        <label for="office">Office (optional)</label>
        <input type="text" class="form-control" id="office" name="office">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" id="category" name="category" required>
    </div>

    <div class="form-group">
        <label for="preferred_date">Preferred Date</label>
        <input type="date" class="form-control" id="preferred_date" name="preferred_date">
    </div>

    <div class="form-group">
        <label for="urgent">Urgent</label>
        <input type="checkbox" id="urgent" name="urgent" value="1">
    </div>

    <div class="form-group">
        <label for="attachments">Attachments</label>
        <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
    </div>

    <button type="submit" class="btn btn-primary">Submit Request</button>
</form>
@endsection

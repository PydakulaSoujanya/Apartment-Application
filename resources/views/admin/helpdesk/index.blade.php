@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mt-4">Help Desk Requests</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Office</th>
                <th>Urgent</th>
                <th>Status</th>
                <th>Preferred Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->request_title }}</td>
                <td>{{ $request->category }}</td>
                <td>{{ $request->office }}</td>
                <td>{{ $request->urgent ? 'Yes' : 'No' }}</td>
                <td>{{ $request->status }}</td>
                <td>{{ $request->preferred_date }}</td>
                <td>
                    <!-- Dropdown Form for Changing Status -->
                    <form action="{{ route('admin.helpdesk.update', $request->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="input-group">
        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
            <option value="Not Yet Started" {{ $request->status == 'Not Yet Started' ? 'selected' : '' }}>Not Yet Started</option>
            <option value="In Progress" {{ $request->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Completed" {{ $request->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
</form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.admin')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


@section('content')
    <div class="container">
        <h2>Meetings List</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('admin.meetings.create') }}" class="btn btn-primary mb-3">
            Add Meeting
        </a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th> <!-- Serial Number Column -->
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Brief Topic</th>
                    <th>Venue</th>
                    <!-- <th>Notes</th>
                    <th>Attendees</th>
                    <th>Alert</th> -->
                    <th>Action</th> <!-- Action Column -->
                </tr>
            </thead>
            <tbody>
                @foreach($meetings as $index => $meeting)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Displaying Serial Number -->
                        <td>{{ $meeting->date }}</td>
                        <td>{{ $meeting->time }}</td>
                        <td>{{ $meeting->duration }}</td>
                        <td>{{ $meeting->brief_topic }}</td>
                        <td>{{ $meeting->venue }}</td>
                        <!-- <td>{{ $meeting->notes }}</td>
                        <td>{{ $meeting->attendees }}</td>
                        <td>{{ implode(', ', $meeting->alert) }}</td> -->
                        <td>
    <!-- Action Buttons for View/Edit/Delete -->
    <a href="{{ route('admin.meetings.show', $meeting->id) }}" class="btn btn-info btn-sm" title="View">
        <i class="fas fa-eye"></i>
    </a>
    
    <a href="{{ route('admin.meetings.edit', $meeting->id) }}" class="btn btn-warning btn-sm" title="Edit">
        <i class="fas fa-edit"></i>
    </a>
    
    <form action="{{ route('admin.meetings.destroy', $meeting->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this meeting?');">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

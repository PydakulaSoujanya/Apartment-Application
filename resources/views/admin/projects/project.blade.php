@extends('layouts.admin')

@section('title', 'Projects & Meetings')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet"> <!-- Bootstrap Icons -->

<style>
    .custom-table th, .custom-table td {
        vertical-align: middle;
    }
    .btn-right {
        float: right; /* Make the button align to the right */
    }
    .action-icons a {
        margin-right: 10px; /* Add some space between icons */
    }
</style>

<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <h3>Meetings</h3>
            <!-- Navigation Tabs -->
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Open</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Closed</a>
                </li>
            </ul>

            <!-- Search Section -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="button-group">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-right">Create Project</a> <!-- Button aligned right -->
                </div>
            </div>

            <!-- Radio Buttons Below the Search Bar -->
            <div class="radio-options">
                <!-- Add any existing radio buttons here if needed -->
            </div>

            <!-- Responsive Table -->
            <div class="table-responsive">
                <table class="table table-striped table-hover custom-table">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>S.No.</th> <!-- S.No. Column -->
                            <th>Category</th>
                            <th>Topic</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Driven By</th>
                            <th>Target Date</th>
                            <th>Actions</th> <!-- Actions Column -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $index => $project) <!-- Using $index for serial number -->
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Display S.No. -->
                            <td>{{ $project->category }}</td>
                            <td>{{ $project->topic }}</td>
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->priority }}</td>
                            <td>{{ $project->driven_by }}</td>
                            <td>{{ \Carbon\Carbon::parse($project->target_date)->format('d/m/Y') }}</td>
                            <td class="action-icons">
                                <!-- Action Icons -->
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-warning">
                                    <i class="bi bi-pencil-square"></i> <!-- Edit Icon -->
                                </a>
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="text-info">
                                    <i class="bi bi-eye"></i> <!-- View Icon -->
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0" onclick="return confirm('Are you sure you want to delete this project?');">
                                        <i class="bi bi-trash"></i> <!-- Delete Icon -->
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection

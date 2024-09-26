@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>All Watchmen</h2>
            <a href="{{ route('admin.register.watchman.form') }}" class="btn btn-primary">Add New</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Qualification</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Aadhar No</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($watchmen as $key => $watchman)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $watchman->name }}</td>
                        <td>{{ $watchman->mobile }}</td>
                        <td>{{ $watchman->email }}</td>
                        <td>{{ $watchman->qualifiacation }}</td>
                        <td>{{ $watchman->experience }}</td>
                        <td>{{ $watchman->aadhar_no }}</td>
                        <td>{{ $watchman->address }}</td>
                        <!-- <td>
                            <button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </td> -->

                        <td>
    <a href="{{ route('admin.watchman-view', $watchman->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
    <a href="{{ route('admin.watchman-edit', $watchman->id) }}" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
    
    <!-- Delete form -->
    <form action="{{ route('admin.watchman-delete', $watchman->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this watchman?');">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

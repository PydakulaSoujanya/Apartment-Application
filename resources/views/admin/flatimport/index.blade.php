@extends('layouts.admin')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2>Flats List</h2>

    <a href="{{ route('admin.flatimport.show') }}" class="btn btn-primary mb-3">Upload New Flats</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Block</th>
                <th>Floor</th>
                <th>Flat Number</th>
                <th>Flat Type</th>
                <th>Area</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flats as $flat)
            <tr>
            <td>{{ $loop->iteration }}</td>
                <td>{{ $flat->block }}</td>
                <td>{{ $flat->floor }}</td>
                <td>{{ $flat->flat_number }}</td>
                <td>{{ $flat->flat_type }}</td>
                <td>{{ $flat->area }}</td>
                <td>{{ $flat->status }}</td>
                <td>
                    <a href="{{ route('admin.flatimport.edit', $flat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.flatimport.destroy', $flat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

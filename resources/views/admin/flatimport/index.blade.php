<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@extends('layouts.admin')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- <h2>Flats List</h2>

    <a href="{{ route('admin.flatimport.show') }}" class="btn btn-primary mb-3">Upload New Flats</a> -->


 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Flats List') }}</h5>
                    <a href="{{ route('admin.flatimport.show') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Upload New Flats
                    </a>
                </div>
                <div class="card-body">
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
</div>
</div>
</div>
@endsection

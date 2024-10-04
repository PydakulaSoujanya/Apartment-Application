

@extends('layouts.admin') <!-- Ensure you're extending the correct layout -->

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha384-O1QyH37nVBLm8tG0psL94y0W3iJ5j5VhdSjip5hE4i9U1F+N8gEJhTWElKb7kUsD" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet"> <!-- Bootstrap Icons -->


    <div class="container">
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Watchmen</h5>
            <a href="{{ route('admin.register.watchman.form') }}" class="btn btn-primary">Add New Watchmen</a> <!-- Link this to your create activity page -->
        </div>
        <div class="card-body">
        <div class="table-responsive">
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
                        <td>{{ $watchman->qualification }}</td>
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
    </div>
    </div>
    </div>
@endsection

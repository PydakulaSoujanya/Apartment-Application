@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>All Watchmen</h2>
            <a href="{{ route('admin.register.secondaryuser.form') }}" class="btn btn-primary">Add New</a>
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
    @foreach ($secondaryusers as $key => $secondaryuser) <!-- Changed from $secondaryuser to $secondaryusers -->
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $secondaryuser->name }}</td>
            <td>{{ $secondaryuser->mobile }}</td>
            <td>{{ $secondaryuser->email }}</td>
            <td>{{ $secondaryuser->qualification }}</td>
            <td>{{ $secondaryuser->experience }}</td>
            <td>{{ $secondaryuser->aadhar_no }}</td>
            <td>{{ $secondaryuser->address }}</td>
            <td>
                <a href="{{ route('admin.secondaryuser-view', $secondaryuser->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                <a href="{{ route('admin.secondaryuser-edit', $secondaryuser->id) }}" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>
                
                <!-- Delete form -->
                <form action="{{ route('admin.secondaryuser-delete', $secondaryuser->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this secondary user?');">
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

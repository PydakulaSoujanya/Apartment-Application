
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Residents List') }}</h5>
                    <a href="{{ route('admin.register.resident.form') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Resident
                    </a>
                </div>


                <div class="card-body">
                    <!-- Table for displaying residents -->
                    <table id="residentsTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>S.N.</th>
                                <th>Flat Holder Name</th>
                                <th>Resident Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Flat No</th>
                                <!-- <th>Floor No</th>
                                <th>Block No</th>
                                <th>Aadhar No</th>
                                <th>Family Members</th>
                                <th>Vehicles</th> -->
                                <th>Actions</th> <!-- Add Action Column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($residents as $resident)
                            <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Serial Number using $loop->iteration -->
                                <td>{{ $resident->flat_holder_name }}</td>
                                <td>{{ $resident->name }}</td>
                                <td>{{ $resident->mobile }}</td>
                                <td>{{ $resident->email }}</td>
                                <td>{{ $resident->flat_number }}</td>
                                <!-- <td>{{ $resident->floor_no }}</td>
                                <td>{{ $resident->block_no }}</td>
                                <td>{{ $resident->aadhar_no }}</td>
                                <td>{{ $resident->family_members }}</td>
                                <td>{{ $resident->vehicles }}</td> -->
                                <td>
                                    <!-- Action Buttons -->
                                    <a href="{{ route('admin.resident.show', $resident->id) }}" class="btn btn-sm btn-primary" title="View">
        <i class="fas fa-eye"></i> <!-- View Icon -->
    </a>
    <a href="{{ route('admin.resident.edit', $resident->id) }}" class="btn btn-sm btn-warning" title="Edit">
    <i class="fas fa-edit"></i> <!-- Edit Icon -->
</a>

                                    <form method="POST" action="#" onsubmit="return confirm('Are you sure you want to delete this resident?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fas fa-trash"></i> <!-- Delete Icon -->
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination if needed -->
                    {{ $residents->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include DataTables scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#residentsTable').DataTable();
    });
</script>
@endsection

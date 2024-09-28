@extends('layouts.admin') <!-- Ensure you're extending the correct layout -->

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha384-O1QyH37nVBLm8tG0psL94y0W3iJ5j5VhdSjip5hE4i9U1F+N8gEJhTWElKb7kUsD" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet"> <!-- Bootstrap Icons -->

    <div class="container">
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Parking Information</h5>
            <a href="{{ route('admin.parking.create') }}" class="btn btn-primary">Add New Parking</a> <!-- Link this to your create activity page -->
        </div>
        <div class="card-body">
            <!-- Responsive table wrapper -->
            <div class="table-responsive">
                <table class="table table-striped">
        <thead>
            <tr>
                <th>S.No.</th>
              
           
                <th>Name</th>
                <th>Vehicle No</th>
                <th>Vehicle Type</th>
                <th>RFID No</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Status</th>
                <!-- <th>Slot No</th>
                <th>Slot Name</th>
                <th>Slot Type</th>
                <th>Block</th>
                <th>Unit No</th>
                <th>Additional Info</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parking as $key => $p)
            <tr>
                <td>{{ $key + 1 }}</td> <!-- Serial number (auto increment based on loop) -->
                <td>{{ $p->name }}</td>
                <td>{{ $p->vehicle_no }}</td>
                <td>{{ $p->vehicle_type }}</td>
                <td>{{ $p->rfid_no }}</td>
                <td>{{ $p->from_date }}</td>
                <td>{{ $p->to_date }}</td>
                <td>{{ $p->status }}</td>
                <!-- <td>{{ $p->slot_no }}</td>
                <td>{{ $p->slot_name }}</td>
                <td>{{ $p->slot_type }}</td>
                <td>{{ $p->block }}</td>
                <td>{{ $p->unit_no }}</td>
                <td>{{ $p->additional_info }}</td> -->
                <td>
                    <a href="{{ route('admin.parking.edit', $p->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('admin.parking.show', $p->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <form action="{{ route('admin.parking.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                            <i class="fas fa-trash-alt"></i>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection

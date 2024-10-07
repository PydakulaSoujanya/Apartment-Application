
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha384-O1QyH37nVBLm8tG0psL94y0W3iJ5j5VhdSjip5hE4i9U1F+N8gEJhTWElKb7kUsD" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet"> <!-- Bootstrap Icons -->

@extends('layouts.admin')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- <h1> Residents Details</h1> -->

        <div class="container">
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Residents Details</h5>
        </div>
        <div class="card-body">

        <!-- Responsive table wrapper -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Flat No</th>
                        <th>Floor No</th>
                        <th>Block No</th>
                        <th>Resident Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Area (SFT)</th>
                        <th>Month</th>
                        <th>Maintenance Charge (Per SFT)</th>
                        <th>Total Maintenance Cost</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($residents as $resident)
                        <tr>
                            <td>{{ $resident->flat_number }}</td>
                            <td>{{ $resident->floor }}</td>
                            <td>{{ $resident->block }}</td>
                            <td>{{ $resident->name }}</td>
                            <td>{{ $resident->mobile }}</td>
                            <td>{{ $resident->email }}</td>
                            <td>{{ $resident->area }}</td>
                            <td>October 2024</td>
                            <td>
                                @if($latestCharge)
                                    {{ $latestCharge->amount_per_sqt }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($latestCharge)
                                    {{ number_format($resident->area * $latestCharge->amount_per_sqt, 2) }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
    @if (!empty($resident->status) && strtolower($resident->status) == 'paid')
        <span style="color: green;">{{ ucfirst($resident->status) }}</span>
    @else
        <span style="color: red;">Not Paid</span>
    @endif
</td>



<td style="white-space: nowrap;">
    <a href="{{ route('admin.resident.edit', $resident->id) }}" class="btn btn-sm btn-warning d-inline">
        <i class="fas fa-edit"></i> <!-- Edit Icon -->
    </a>

    <form action="{{ route('admin.resident.destroy', $resident->id) }}" method="POST" style="display:inline; margin-left: 5px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this resident?')">
            <i class="fas fa-trash"></i> <!-- Delete Icon -->
        </button>
    </form>
</td>



                        </tr>
                    @endforeach
                </tbody>
            </table>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        </div> <!-- End responsive table wrapper -->
    </div>
    </div>
    </div>
@endsection

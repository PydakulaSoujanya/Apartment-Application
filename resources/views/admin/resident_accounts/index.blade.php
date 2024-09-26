@extends('layouts.admin')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h1>Resident Details</h1>

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
                        <th>Maintenance Charge (Per SFT)</th>
                        <th>Total Maintenance Cost</th>
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
    <a href="{{ route('admin.resident.edit', $resident->id) }}" class="btn btn-sm btn-warning d-inline">
        <i class="fas fa-edit"></i> <!-- Edit Icon -->
    </a>

    <form action="{{ route('admin.resident.destroy', $resident->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger d-inline" onclick="return confirm('Are you sure you want to delete this resident?')">
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
@endsection

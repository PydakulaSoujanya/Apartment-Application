@extends('layouts.admin')

@section('title', 'Facilities List')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Facilities List</h5>
            <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary mt-2">Add New Facility</a>
        </div>
        <div class="card-body">
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Facility Name</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Charge Per Day</th>
                        <th>Cancel Days</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facilities as $facility)
                        <tr>
                            <td>{{ $facility->facility_name }}</td>
                            <td>{{ $facility->start_time }}</td>
                            <td>{{ $facility->end_time }}</td>
                            <td>{{ $facility->charge_per_day }}</td>
                            <td>{{ $facility->cancel_days }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          
        </div>
    </div>
</div>
@endsection



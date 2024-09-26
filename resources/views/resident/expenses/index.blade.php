<style>
        body {
            background-color: #ffffff; /* Set background color to white */
        }
        .container, .card {
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* Ensure container background is white */
        }
        h3 {
            color: #007bff;
        }
        .table thead th {
            color: #0b0a0a;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        /* Media query for mobile and iPad devices */
        @media (max-width: 1024px) {
            .container {
                padding: 15px;
            }
            .table {
                font-size: 0.9rem;
            }
            .btn-primary {
                width: 100%;
            }
        }
    </style>


@extends('layouts.resident')

@section('content')

    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold">Apartment Expenditures</h3>
       
    </div>

    <div class="card-body">
        <div class="table-responsive"></div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Paid Date</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->category }}</td>
                <td>{{ $expense->description }}</td>
                <td>{{ $expense->amount }}</td>
                <td>{{ $expense->paid_date }}</td>
                <td>
                    @if($expense->file_path)
                        <a href="{{ Storage::url($expense->file_path) }}" target="_blank">View File</a>
                    @else
                        No file uploaded
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
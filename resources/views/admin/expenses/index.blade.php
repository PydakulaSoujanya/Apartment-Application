@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Expenses List') }}</h5>
                    <a href="{{ route('expenses.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Expense
                    </a>
                </div>

                <div class="card-body">
<<<<<<< HEAD
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Sl no</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Paid Date</th>
                                <th>File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $expense)
                            <tr>
                                <!-- Serial number using $loop->iteration -->
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $expense->category }}</td>
                                <td>{{ $expense->description }}</td>
                                <td>{{ $expense->amount }}</td>
                                <td>{{ $expense->paid_date }}</td>
                                <td>
                                    @if($expense->file_path)
                                    <a href="{{ asset('expenses/' . $expense->file_path) }}" target="_blank">View File</a>
                                    @else
                                        No file uploaded
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning btn-sm">Edit</a>
=======
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vendor Name</th>

                <th>Category</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Paid Date</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->vendor->vendor_name ?? 'No Vendor' }}</td>  <!-- Fetch vendor_name, or 'No Vendor' if null -->
                <td>{{ $expense->category }}</td>
                <td>{{ $expense->description }}</td>
                <td>{{ $expense->amount }}</td>
                <td>{{ $expense->paid_date }}</td>
                <td>
                    @if($expense->file_path)
                    <a href="{{ asset('expenses/' . $expense->file_path) }}" target="_blank">View File</a>
                    @else
                        No file uploaded
                    @endif
                </td>
                <td>
                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning btn-sm">Edit</a>
>>>>>>> 748d9e32700af7bb4b9e852e5f556a2ad6502a85

                                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this expense?')">Delete</button>
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
</div>

@endsection

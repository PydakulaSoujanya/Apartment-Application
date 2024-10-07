
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
=======

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Sl no</th>
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $expense->vendor->vendor_name ?? 'No Vendor' }}</td>
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
>>>>>>> 83b2cff08b7364f42ef2827b0ccb5aabb6ca2b75
                </div>
</div>
<<<<<<< HEAD
</div>
</div>
=======

>>>>>>> 83b2cff08b7364f42ef2827b0ccb5aabb6ca2b75
@endsection
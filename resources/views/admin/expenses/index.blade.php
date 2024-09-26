@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Expenses</h1>

    <!-- Button to Add New Expense -->
    <div class="mb-3">
        <a href="{{ route('expenses.create') }}" class="btn btn-primary">Add New Expense</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
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
</div>
@endsection

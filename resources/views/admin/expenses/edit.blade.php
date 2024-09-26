@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Expense</h1>

    <form action="{{ route('expenses.update', $expense->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" class="form-control" value="{{ old('category', $expense->category) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ old('description', $expense->description) }}">
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', $expense->amount) }}" required>
        </div>

        <div class="form-group">
            <label for="paid_date">Paid Date</label>
            <input type="date" id="paid_date" name="paid_date" class="form-control" value="{{ old('paid_date', $expense->paid_date) }}" required>
        </div>

        <div class="form-group">
            <label for="month">Month</label>
            <input type="text" id="month" name="month" class="form-control" value="{{ old('month', $expense->month) }}" required>
        </div>

        <div class="form-group">
            <label for="file">Upload File (optional)</label>
            
            @if($expense->file_path)
                <p>Current File: 
                    <a href="{{ asset('expenses/' . $expense->file_path) }}" target="_blank">View File</a>
                </p>
            @else
                <p>No file uploaded</p>
            @endif
            
            <!-- File upload input -->
            <input type="file" id="file" name="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Expense</button>
    </form>
</div>
@endsection

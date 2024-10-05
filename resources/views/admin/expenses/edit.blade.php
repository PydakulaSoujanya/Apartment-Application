@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9"> <!-- Adjust this to change the form width -->
            <div class="card">
                <div class="card-header">{{ __('Edit Expense') }}</div>

                <div class="card-body">

    <form action="{{ route('expenses.update', $expense->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group row mb-3">
            <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
            <div class="col-md-6">
                <input type="text" id="category" name="category" class="form-control" value="{{ old('category', $expense->category) }}" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
            <div class="col-md-6">
                <input type="text" id="description" name="description" class="form-control" value="{{ old('description', $expense->description) }}">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
            <div class="col-md-6">
                <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', $expense->amount) }}" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="paid_date" class="col-md-4 col-form-label text-md-right">Paid Date</label>
            <div class="col-md-6">
                <input type="date" id="paid_date" name="paid_date" class="form-control" value="{{ old('paid_date', $expense->paid_date) }}" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="month" class="col-md-4 col-form-label text-md-right">Month</label>
            <div class="col-md-6">
                <input type="text" id="month" name="month" class="form-control" value="{{ old('month', $expense->month) }}" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="file" class="col-md-4 col-form-label text-md-right">Upload File (optional)</label>
            <div class="col-md-6">
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
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <!-- Update Expense Button -->
                <button type="submit" class="btn btn-primary">
                    {{ __('Update Expense') }}
                </button>

                <!-- Close Button -->
                <button type="button" class="btn btn-secondary ms-2" onclick="window.location='{{ url()->previous() }}'">
                    {{ __('Close') }}
                </button>
            </div>
        </div>
    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container mt-5">
<form action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" class="form-control" required>
            <option value="Utility charge">Utility charge</option>
            <option value="Water bill">Water bill</option>
            <option value="Lift maintenance">Lift maintenance</option>
            <option value="Others">Others</option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" step="0.01" name="amount" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="paid_date">Paid Date</label>
        <input type="date" name="paid_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="month">Month</label>
        <input type="month" name="month" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="file">Upload File</label>
        <input type="file" name="file" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection

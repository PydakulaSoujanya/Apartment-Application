@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Maintenance Charges</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('maintenance.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount_per_sqt">Amount per Square Meter:</label>
            <input type="number" step="0.01" class="form-control" id="amount_per_sqt" name="amount_per_sqt" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Charge</button>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount per Square Meter</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($charges as $charge)
            <tr>
                <td>{{ $charge->id }}</td>
                <td>
                    <form action="{{ route('maintenance.update', $charge->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="number" step="0.01" name="amount_per_sqt" value="{{ $charge->amount_per_sqt }}" required>
                        <button type="submit" class="btn btn-warning btn-sm">Update</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('maintenance.destroy', $charge->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

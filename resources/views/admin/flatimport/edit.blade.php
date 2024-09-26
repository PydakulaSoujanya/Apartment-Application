@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Flat</h2>

    <form action="{{ route('admin.flatimport.update', $flat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="block">Block</label>
            <input type="text" name="block" value="{{ $flat->block }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="floor">Floor</label>
            <input type="number" name="floor" value="{{ $flat->floor }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="flat_number">Flat Number</label>
            <input type="text" name="flat_number" value="{{ $flat->flat_number }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="flat_type">Flat Type</label>
            <input type="text" name="flat_type" value="{{ $flat->flat_type }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="area">Area</label>
            <input type="number" name="area" value="{{ $flat->area }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" value="{{ $flat->status }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Flat</button>
    </form>
</div>
@endsection

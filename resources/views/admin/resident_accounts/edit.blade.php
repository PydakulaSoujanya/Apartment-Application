@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Resident Details</h1>

        <form action="{{ route('admin.resident.update', $resident->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="flat_number">Flat No</label>
                <input type="text" name="flat_number" class="form-control" value="{{ old('flat_number', $resident->flat_number) }}" required>
            </div>

            <div class="form-group">
                <label for="floor">Floor No</label>
                <input type="text" name="floor" class="form-control" value="{{ old('floor', $resident->floor) }}" required>
            </div>

            <div class="form-group">
                <label for="block">Block No</label>
                <input type="text" name="block" class="form-control" value="{{ old('block', $resident->block) }}" required>
            </div>

            <div class="form-group">
                <label for="flat_holder_name">Flat Holder Name</label>
                <input type="text" name="flat_holder_name" class="form-control" value="{{ old('flat_holder_name', $resident->flat_holder_name) }}" required>
            </div>

            <div class="form-group">
                <label for="name">Resident Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $resident->name) }}" required>
            </div>

            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $resident->mobile) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $resident->email) }}" required>
            </div>

            <div class="form-group">
                <label for="area">Area (SFT)</label>
                <input type="number" name="area" class="form-control" value="{{ old('area', $resident->area) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

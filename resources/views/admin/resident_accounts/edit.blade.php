@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Resident Details</h1>

        <form action="{{ route('admin.resident.update', $resident->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Flat Number -->
            <div class="form-group row">
                <label for="flat_number" class="col-md-4 col-form-label text-md-right">Flat No</label>
                <div class="col-md-8">
                    <input type="text" name="flat_number" class="form-control" value="{{ old('flat_number', $resident->flat_number) }}" required>
                </div>
            </div>

            <!-- Floor Number -->
            <div class="form-group row">
                <label for="floor" class="col-md-4 col-form-label text-md-right">Floor No</label>
                <div class="col-md-8">
                    <input type="text" name="floor" class="form-control" value="{{ old('floor', $resident->floor) }}" required>
                </div>
            </div>

            <!-- Block Number -->
            <div class="form-group row">
                <label for="block" class="col-md-4 col-form-label text-md-right">Block No</label>
                <div class="col-md-8">
                    <input type="text" name="block" class="form-control" value="{{ old('block', $resident->block) }}" required>
                </div>
            </div>

            <!-- Flat Holder Name -->
            <div class="form-group row">
                <label for="flat_holder_name" class="col-md-4 col-form-label text-md-right">Flat Holder Name</label>
                <div class="col-md-8">
                    <input type="text" name="flat_holder_name" class="form-control" value="{{ old('flat_holder_name', $resident->flat_holder_name) }}" required>
                </div>
            </div>

            <!-- Resident Name -->
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Resident Name</label>
                <div class="col-md-8">
                    <input type="text" name="name" class="form-control" value="{{ old('name', $resident->name) }}" required>
                </div>
            </div>

            <!-- Mobile -->
            <div class="form-group row">
                <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile</label>
                <div class="col-md-8">
                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $resident->mobile) }}" required>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-8">
                    <input type="email" name="email" class="form-control" value="{{ old('email', $resident->email) }}" required>
                </div>
            </div>

            <!-- Area -->
            <div class="form-group row">
                <label for="area" class="col-md-4 col-form-label text-md-right">Area (SFT)</label>
                <div class="col-md-8">
                    <input type="number" name="area" class="form-control" value="{{ old('area', $resident->area) }}" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection

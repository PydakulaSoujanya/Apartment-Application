@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Resident') }}
                    <a href="{{ route('admin.view.residents') }}" class="btn btn-primary float-right">Back to List</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.resident.update', $resident->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="flat_holder_name">Flat Holder Name:</label>
                            <input type="text" id="flat_holder_name" name="flat_holder_name" class="form-control" value="{{ old('flat_holder_name', $resident->flat_holder_name) }}" required>
                            @error('flat_holder_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Resident Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $resident->name) }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" value="{{ old('mobile', $resident->mobile) }}" required>
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $resident->email) }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="flat_number">Flat No:</label>
                            <input type="text" id="flat_number" name="flat_number" class="form-control" value="{{ old('flat_number', $resident->flat_number) }}" required>
                            @error('flat_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="floor">Floor No:</label>
                            <input type="text" id="floor" name="floor" class="form-control" value="{{ old('floor', $resident->floor) }}" required>
                            @error('floor')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="block">Block No:</label>
                            <input type="text" id="block" name="block" class="form-control" value="{{ old('block', $resident->block) }}" required>
                            @error('block')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="flat_type">Flat Type:</label>
                            <input type="text" id="flat_type" name="flat_type" class="form-control" value="{{ old('flat_type', $resident->flat_type) }}" required>
                            @error('flat_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="area">Area:</label>
                            <input type="text" id="area" name="area" class="form-control" value="{{ old('area', $resident->area) }}" required>
                            @error('area')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="aadhar_no">Aadhar No:</label>
                            <input type="text" id="aadhar_no" name="aadhar_no" class="form-control" value="{{ old('aadhar_no', $resident->aadhar_no) }}">
                            @error('aadhar_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="family_members">Family Members:</label>
                            <input type="number" id="family_members" name="family_members" class="form-control" value="{{ old('family_members', $resident->family_members) }}">
                            @error('family_members')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="vehicles">Vehicles:</label>
                            <input type="number" id="vehicles" name="vehicles" class="form-control" value="{{ old('vehicles', $resident->vehicles) }}">
                            @error('vehicles')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                      

                        <button type="submit" class="btn btn-primary">Update Resident</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

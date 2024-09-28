@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Adjust the column width here -->
            <div class="card">
                <div class="card-header">{{ __('Edit Flat') }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.flatimport.update', $flat->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Block -->
                        <div class="form-group mb-3">
                            <label for="block">{{ __('Block') }}</label>
                            <input type="text" name="block" value="{{ $flat->block }}" class="form-control" required>
                        </div>

                        <!-- Floor -->
                        <div class="form-group mb-3">
                            <label for="floor">{{ __('Floor') }}</label>
                            <input type="number" name="floor" value="{{ $flat->floor }}" class="form-control" required>
                        </div>

                        <!-- Flat Number -->
                        <div class="form-group mb-3">
                            <label for="flat_number">{{ __('Flat Number') }}</label>
                            <input type="text" name="flat_number" value="{{ $flat->flat_number }}" class="form-control" required>
                        </div>

                        <!-- Flat Type -->
                        <div class="form-group mb-3">
                            <label for="flat_type">{{ __('Flat Type') }}</label>
                            <input type="text" name="flat_type" value="{{ $flat->flat_type }}" class="form-control" required>
                        </div>

                        <!-- Area -->
                        <div class="form-group mb-3">
                            <label for="area">{{ __('Area') }}</label>
                            <input type="number" name="area" value="{{ $flat->area }}" class="form-control" required>
                        </div>

                        <!-- Status -->
                        <div class="form-group mb-3">
                            <label for="status">{{ __('Status') }}</label>
                            <input type="text" name="status" value="{{ $flat->status }}" class="form-control" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Flat') }}
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

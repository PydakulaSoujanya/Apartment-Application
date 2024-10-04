@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Register Resident') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register.resident') }}">
                        @csrf

                        <div class="row">
                            <!-- Left Side: Apartment Details -->
                            <div class="col-md-6">
                                <h5>{{ __('Apartment Details') }}</h5>

                  <!-- Block No Dropdown -->
                  <div class="form-group row mb-3">
                                    <label for="block" class="col-md-4 col-form-label text-md-right">{{ __('Block No') }}</label>
                                    <div class="col-md-8">
                                        <select id="block" name="block" class="form-control" required>
                                            <option value="" disabled selected>Select Block No</option>
                                            @foreach($availableFlats as $flat)
                                                <option value="{{ $flat->block }}">{{ $flat->block }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Flat No Dropdown -->
                                <div class="form-group row mb-3">
                                    <label for="flat_number" class="col-md-4 col-form-label text-md-right">{{ __('Flat No') }}</label>
                                    <div class="col-md-8">
                                        <select id="flat_number" name="flat_number" class="form-control" required>
                                            <option value="" disabled selected>Select Flat No</option>
                                            @foreach($availableFlats as $flat)
                                                <option value="{{ $flat->flat_number }}">{{ $flat->flat_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Floor No Dropdown -->
                                <div class="form-group row mb-3">
                                    <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('Floor No') }}</label>
                                    <div class="col-md-8">
                                        <select id="floor" name="floor" class="form-control" required>
                                            <option value="" disabled selected>Select Floor No</option>
                                            @foreach($availableFlats as $flat)
                                                <option value="{{ $flat->floor }}">{{ $flat->floor }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                          

                                <!-- Flat Type Field -->
                                <div class="form-group row mb-3">
                                    <label for="flat_type" class="col-md-4 col-form-label text-md-right">{{ __('Flat Type') }}</label>
                                    <div class="col-md-8">
                                        <input id="flat_type" type="text" class="form-control @error('flat_type') is-invalid @enderror" name="flat_type" value="{{ old('flat_type') }}" required>
                                        @error('flat_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Area Field -->
                                <div class="form-group row mb-3">
                                    <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area -sqft') }}</label>
                                    <div class="col-md-8">
                                        <input id="area" type="number" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required>
                                        @error('area')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Flat Holder Name Field -->
                                <div class="form-group row mb-3">
                                    <label for="flat_holder_name" class="col-md-4 col-form-label text-md-right">{{ __('Flat Holder Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="flat_holder_name" type="text" class="form-control @error('flat_holder_name') is-invalid @enderror" name="flat_holder_name" value="{{ old('flat_holder_name') }}" required>
                                        @error('flat_holder_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side: Personal Details -->
                            <div class="col-md-6">
                                <h5>{{ __('Personal Details') }}</h5>

                                <!-- Resident Name Field -->
                                <div class="form-group row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Resident Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Checkbox for Same as Flat Holder Name -->
                                <div class="form-group row mb-3">
                                    <div class="col-md-8 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="same_as_flat_holder" onclick="copyFlatHolderName()">
                                            <label class="form-check-label" for="same_as_flat_holder">
                                                {{ __('Same as Flat Holder Name') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Aadhar Number Field -->
                                <div class="form-group row mb-3">
                                    <label for="aadhar_no" class="col-md-4 col-form-label text-md-right">{{ __('Aadhar Number') }}</label>
                                    <div class="col-md-8">
                                        <input id="aadhar_no" type="text" class="form-control @error('aadhar_no') is-invalid @enderror" name="aadhar_no" value="{{ old('aadhar_no') }}" required>
                                        @error('aadhar_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Mobile Field -->
                                <div class="form-group row mb-3">
                                    <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
                                    <div class="col-md-8">
                                        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required>
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email Field -->
                                <div class="form-group row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Family Members Field -->
                                <div class="form-group row mb-3">
                                    <label for="family_members" class="col-md-4 col-form-label text-md-right">{{ __('Family Members') }}</label>
                                    <div class="col-md-8">
                                        <input id="family_members" type="number" class="form-control @error('family_members') is-invalid @enderror" name="family_members" value="{{ old('family_members') }}" required>
                                        @error('family_members')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Number of Vehicles Field -->
                                <div class="form-group row mb-3">
                                    <label for="vehicles" class="col-md-4 col-form-label text-md-right">{{ __('No. of Vehicles') }}</label>
                                    <div class="col-md-8">
                                        <input id="vehicles" type="number" class="form-control @error('vehicles') is-invalid @enderror" name="vehicles" value="{{ old('vehicles') }}" required>
                                        @error('vehicles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Resident') }}
                                </button>
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

<script>
    function copyFlatHolderName() {
        var checkBox = document.getElementById('same_as_flat_holder');
        var flatHolderName = document.getElementById('flat_holder_name');
        var residentName = document.getElementById('name');
        
        if (checkBox.checked == true) {
            residentName.value = flatHolderName.value;
        } else {
            residentName.value = '';
        }
    }
</script>

@endsection

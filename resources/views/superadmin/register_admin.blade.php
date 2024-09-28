<!-- @extends('layouts.app') -->

@section('content')
<div class="d-flex">
@include('superadmin.sidebar')
<div class="container d-flex justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Register Admin') }}</div>
                <div class="card-body">
                    <form action="{{ route('superadmin.register.admin') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Apartment Details Section -->
                            <div class="col-md-6">
                                <h5 class="mb-3">{{ __('Apartment Details') }}</h5>
                                <div class="form-group row mb-3">
                                    <label for="apartment_name" class="col-md-4 col-form-label text-md-right">{{ __('Apartment Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="apartment_name" type="text" class="form-control" name="apartment_name" value="{{ old('apartment_name') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="apartment_purpose" class="col-md-4 col-form-label text-md-right">{{ __('Apartment Type') }}</label>
                                    <div class="col-md-8">
                                        <select id="apartment_purpose" class="form-control" name="apartment_purpose" required>
                                            <option value="" disabled selected>Select Purpose</option>
                                            <option value="Industry" {{ old('apartment_purpose') == 'Industry' ? 'selected' : '' }}>Industry</option>
                                            <option value="Home" {{ old('apartment_purpose') == 'Home' ? 'selected' : '' }}>Home</option>
                                            <option value="Apartment" {{ old('apartment_purpose') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="apartment_address" class="col-md-4 col-form-label text-md-right">{{ __('House Number') }}</label>
                                    <div class="col-md-8">
                                        <input id="apartment_address" type="text" class="form-control" name="apartment_address" value="{{ old('apartment_address') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                                    <div class="col-md-8">
                                        <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
                                    <div class="col-md-8">
                                        <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="pincode" class="col-md-4 col-form-label text-md-right">{{ __('Pincode') }}</label>
                                    <div class="col-md-8">
                                        <input id="pincode" type="text" class="form-control" name="pincode" value="{{ old('pincode') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                                    <div class="col-md-8">
                                        <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Details Section -->
                            <div class="col-md-6">
                                <h5 class="mb-3">{{ __('Admin Details') }}</h5>
                                <div class="form-group row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Admin Name') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
                                    <div class="col-md-8">
                                        <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Register Admin') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

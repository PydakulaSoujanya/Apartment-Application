@extends('layouts.admin')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
    <div class="row justify-content-center align-items-center>

        <div class="col-md-9">
            <h4 class="text-center mt-5 mb-5">Flat Registration</h4>
            <div class="card">
                <div class="card-header">{{ __('Flat Registration') }}</div>

                <div class="card-body">
                    <!-- First row with Block Name and Floor Number -->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="block_name" class="col-form-label text-md-right">{{ __('Block Name') }}</label>
                            <input type="text" id="block_name" name="block_name" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="floor_no" class="col-form-label text-md-right">{{ __('Floor No.') }}</label>
                            <input type="text" id="floor_no" name="floor_no" class="form-control" required>
                        </div>
                    </div>

                    <!-- Second row with Flat Number and Flat Type -->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="flat_number" class="col-form-label text-md-right">{{ __('Flat Number') }}</label>
                            <input type="text" id="flat_number" name="flat_number" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="flat_type" class="col-form-label text-md-right">{{ __('Flat Type') }}</label>
                            <input type="text" id="flat_type" name="flat_type" class="form-control" required>
                        </div>
                    </div>

                    <!-- Third row with Area -->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="area" class="col-form-label text-md-right">{{ __('Area (sq ft)') }}</label>
                            <input type="text" id="area" name="area" class="form-control" required>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="form-group row mb-0 mt-5">
                        <div class="col-md-6 offset-md-4">
                            <a href="#" id="submitBtn" class="btn btn-primary btn-center" onclick="navigateToRoute()">
                                {{ __('Submit') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection

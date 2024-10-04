@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9"> <!-- Adjust this to change the form width -->
            <div class="card">
                <div class="card-header">{{ __('Register Expense') }}</div>

                <div class="card-body">
                    <form action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <!-- Vendor Name -->
                         <div class="form-group row mb-3">
    <label for="vendor_name" class="col-md-4 col-form-label text-md-right">{{ __('Vendor Name') }}</label>
    <div class="col-md-8">
        <select name="vendor_name" class="form-control" required>
            <option value="" disabled selected>Select Vendor</option>
            @foreach($vendors as $vendor)
                <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
            @endforeach
        </select>
    </div>
</div>



                        <!-- Category -->
                        <div class="form-group row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-8">
                                <select name="category" class="form-control" required>
                                    <option value="Utility charge">Utility charge</option>
                                    <option value="Water bill">Water bill</option>
                                    <option value="Lift maintenance">Lift maintenance</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-8">
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Amount -->
                        <div class="form-group row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>
                            <div class="col-md-8">
                                <input type="number" step="0.01" name="amount" class="form-control" required>
                            </div>
                        </div>

                        <!-- Paid Date -->
                        <div class="form-group row mb-3">
                            <label for="paid_date" class="col-md-4 col-form-label text-md-right">{{ __('Paid Date') }}</label>
                            <div class="col-md-8">
                                <input type="date" name="paid_date" class="form-control" required>
                            </div>
                        </div>

                        <!-- Month -->
                        <div class="form-group row mb-3">
                            <label for="month" class="col-md-4 col-form-label text-md-right">{{ __('Month') }}</label>
                            <div class="col-md-8">
                                <input type="month" name="month" class="form-control" required>
                            </div>
                        </div>

                        <!-- File Upload -->
                        <div class="form-group row mb-3">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Upload File') }}</label>
                            <div class="col-md-8">
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
    <div class="col-md-12 text-center">
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>

        <!-- Close Button -->
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
@endsection

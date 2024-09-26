@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Watchman Details') }}</h5>
                    <a href="{{ route('admin.watchman-list') }}" class="btn btn-primary">Back to List</a>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Name:</dt>
                        <dd class="col-sm-8">{{ $watchman->name }}</dd>

                        <dt class="col-sm-4">Mobile:</dt>
                        <dd class="col-sm-8">{{ $watchman->mobile }}</dd>

                        <dt class="col-sm-4">Email:</dt>
                        <dd class="col-sm-8">{{ $watchman->email }}</dd>

                        <dt class="col-sm-4">Education Qualification:</dt>
                        <dd class="col-sm-8">{{ $watchman->qualifiacation }}</dd>

                        <dt class="col-sm-4">Experience:</dt>
                        <dd class="col-sm-8">{{ $watchman->experience }}</dd>

                        <dt class="col-sm-4">Aadhaar Number:</dt>
                        <dd class="col-sm-8">{{ $watchman->aadhar_no }}</dd>

                        <dt class="col-sm-4">Address:</dt>
                        <dd class="col-sm-8">{{ $watchman->address }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

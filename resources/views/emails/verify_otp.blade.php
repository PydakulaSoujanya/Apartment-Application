@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify OTP') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('admin.verify.otp', ['id' => $id]) }}">
    @csrf
    <div class="form-group">
        <label for="otp">Enter OTP:</label>
        <input type="text" id="otp" name="otp" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Verify OTP</button>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@extends('layouts.manager')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>You are a Manager User.</h2>
                     <!-- Display user's name and email -->
                     <p class="mt-4">
                        <strong>Name:</strong> {{ Auth::user()->name }}
                    </p>
                    <p>
                        <strong>Email:</strong> {{ Auth::user()->email }}
                    </p>

                    <a href="{{ route('manager.register.resident.form') }}" class="btn btn-primary">
                        Register New Resident
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

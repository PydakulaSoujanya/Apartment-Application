@extends('layouts.resident')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Resident Details') }}</h5>
                    <a href="{{ route('admin.view.residents') }}" class="btn btn-primary">Back to List</a>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Flat Holder Name:</dt>
                        <dd class="col-sm-8">{{ $resident->flat_holder_name }}</dd>

                        <dt class="col-sm-4">Resident Name:</dt>
                        <dd class="col-sm-8">{{ $resident->name }}</dd>

                        <dt class="col-sm-4">Flat No:</dt>
                        <dd class="col-sm-8">{{ $resident->flat_no }}</dd>

                        <dt class="col-sm-4">Floor No:</dt>
                        <dd class="col-sm-8">{{ $resident->floor_no }}</dd>

                        <dt class="col-sm-4">Block No:</dt>
                        <dd class="col-sm-8">{{ $resident->block_no }}</dd>

                        <dt class="col-sm-4">Aadhar No:</dt>
                        <dd class="col-sm-8">{{ $resident->aadhar_no }}</dd>

                        <dt class="col-sm-4">Mobile:</dt>
                        <dd class="col-sm-8">{{ $resident->mobile }}</dd>

                        <dt class="col-sm-4">Email:</dt>
                        <dd class="col-sm-8">{{ $resident->email }}</dd>

                        <dt class="col-sm-4">Family Members:</dt>
                        <dd class="col-sm-8">{{ $resident->family_members }}</dd>

                        <dt class="col-sm-4">Vehicles:</dt>
                        <dd class="col-sm-8">{{ $resident->vehicles }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

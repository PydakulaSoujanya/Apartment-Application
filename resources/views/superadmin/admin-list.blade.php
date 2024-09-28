<!-- resources/views/superadmin/admin-list.blade.php -->

@extends('layouts.superadmin')

@section('title', 'Admin list')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Details</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Apartment Name</th>
                <th>Apartment Type</th>
                <th>House Number</th>
                <th>City</th>
                <th>State</th>
                <th>Pincode</th>
                <th>Country</th>
                <th>Admin Name</th>
                <th>Mobile</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->apartment_name }}</td>
                <td>{{ $admin->apartment_purpose }}</td>
                <td>{{ $admin->apartment_address }}</td>
                <td>{{ $admin->city }}</td>
                <td>{{ $admin->state }}</td>
                <td>{{ $admin->pincode }}</td>
                <td>{{ $admin->country }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->mobile }}</td>
                <td>{{ $admin->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

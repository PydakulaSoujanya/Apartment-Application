@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Register Watchman</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register.watchman') }}">
                        @csrf
                        <table class="table">
                            <tbody>
                                <!-- Add Vendor Selection -->
                                <tr>
                                    <td><label for="vendor" class="form-label">Select Vendor</label></td>
                                    <td>
                                        <select id="vendor" class="form-control" name="vendor_id" required>
                                            <option value="">-- Select Vendor --</option>
                                            @foreach($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <!-- Other fields remain the same -->
                                <tr>
                                    <td><label for="name" class="form-label">Name</label></td>
                                    <td>
                                        <input id="name" type="text" class="form-control" name="name" required autofocus>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="mobile" class="form-label">Mobile</label></td>
                                    <td>
                                        <input id="mobile" type="text" class="form-control" name="mobile" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="email" class="form-label">Email</label></td>
                                    <td>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="password" class="form-label">Password</label></td>
                                    <td>
                                        <input id="password" type="password" class="form-control" name="password" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="password-confirm" class="form-label">Confirm Password</label></td>
                                    <td>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="qualification" class="form-label">Education Qualification</label></td>
                                    <td>
                                        <input id="qualification" type="text" class="form-control" name="qualification" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="experience" class="form-label">Experience</label></td>
                                    <td>
                                        <input id="experience" type="text" class="form-control" name="experience" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="aadhar_no" class="form-label">Aadhaar Number</label></td>
                                    <td>
                                        <input id="aadhar_no" type="text" class="form-control" name="aadhar_no" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="address" class="form-label">Address</label></td>
                                    <td>
                                        <input id="address" type="text" class="form-control" name="address" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Register Watchman</button>
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='/admin/watchmen';">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

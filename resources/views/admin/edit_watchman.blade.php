@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Watchman</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.watchman-update', $watchman->id) }}">
                        @csrf
                        @method('PUT') <!-- For updating, include PUT method -->

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><label for="name" class="form-label">Name</label></td>
                                    <td>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $watchman->name }}" required autofocus>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="mobile" class="form-label">Mobile</label></td>
                                    <td>
                                        <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $watchman->mobile }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="email" class="form-label">Email</label></td>
                                    <td>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $watchman->email }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="password" class="form-label">Password (Leave blank if unchanged)</label></td>
                                    <td>
                                        <input id="password" type="password" class="form-control" name="password">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="password-confirm" class="form-label">Confirm Password</label></td>
                                    <td>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="qualification" class="form-label">Education Qualification</label></td>
                                    <td>
                                        <input id="qualification" type="text" class="form-control" name="qualification" value="{{ $watchman->qualifiacation }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="experience" class="form-label">Experience</label></td>
                                    <td>
                                        <input id="experience" type="text" class="form-control" name="experience" value="{{ $watchman->experience }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="aadhar_no" class="form-label">Aadhaar Number</label></td>
                                    <td>
                                        <input id="aadhar_no" type="text" class="form-control" name="aadhar_no" value="{{ $watchman->aadhar_no }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="address" class="form-label">Address</label></td>
                                    <td>
                                        <input id="address" type="text" class="form-control" name="address" value="{{ $watchman->address }}" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update Watchman</button>
                            <a href="{{ route('admin.watchman-list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

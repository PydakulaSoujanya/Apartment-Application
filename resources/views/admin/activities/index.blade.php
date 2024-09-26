@extends('layouts.admin')

@section('title', 'Activities List')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Activities List</h5>
            <a href="{{ route('admin.activities.create') }}" class="btn btn-primary">Add New Activity</a> <!-- Link this to your create activity page -->
        </div>
        <div class="card-body">
            <!-- Responsive table wrapper -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Activity Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Charge per Participant</th>
                            <th>Max Participants</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Static Row 1 -->
                        <tr>
                            <td>1</td>
                            <td>Yoga Class</td>
                            <td>Morning yoga session</td>
                            <td>2024-09-15</td>
                            <td>200</td>
                            <td>20</td>
                            <!-- <td>
                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td> -->
                        </tr>
                        <!-- Static Row 2 -->
                        <tr>
                            <td>2</td>
                            <td>Swimming Competition</td>
                            <td>Annual swimming race</td>
                            <td>2024-10-10</td>
                            <td>500</td>
                            <td>50</td>
                            <!-- <td>
                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td> -->
                        </tr>
                        <!-- Static Row 3 -->
                        <tr>
                            <td>3</td>
                            <td>Cooking Workshop</td>
                            <td>Basic cooking lessons</td>
                            <td>2024-11-01</td>
                            <td>100</td>
                            <td>30</td>
                            <!-- <td>
                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td> -->
                        </tr>
                        <!-- Add more static rows as needed -->
                    </tbody>
                </table>
            </div> <!-- End of table-responsive -->
        </div>
    </div>
</div>
@endsection

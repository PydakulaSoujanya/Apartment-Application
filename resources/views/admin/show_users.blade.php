@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Container for layout */
        .container {
            font-family: Roboto, Helvetica, Arial, sans-serif;
            padding: 20px;
        }

        /* Card style similar to screenshot */
        .card {
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            background-color: white;
            margin: 0 auto;
            width: 85%; /* Reduced width for sidebar */
          
        }

        /* Heading with icon */
        .heading {
            display: flex;
            align-items: center;
            font-weight: 10px;
            margin-left: 100px;
            margin-top: -2px;
        }

        .heading-icon {
            position: absolute;
    top: 50px; /* Adjust as per your design */
left: 160px; /* Adjust positioning */
    background-color: #6c757d; /* Gray background for icon */
    color: white;
    padding: 15px;
    border-radius: 10%; /* Circular shape */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 10;
        }

        /* Table and layout */
        .table-responsive {
            margin-top: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            font-size: 14px;
        }

        /* Action button styling */
        .icon-btn {
            background-color: transparent;
            border: none;
            padding: 0;
            margin-right: 10px;
        }

        .icon-btn i {
            font-size: 1.0em;
        }

        .view-icon {
            color: #0976b4;
        }

        .edit-icon {
            color: green;
        }

        .delete-icon {
            color: red;
        }

        /* Icon hover effects */
        .icon-btn:hover .view-icon {
            color: #9c27b0;
        }

        .icon-btn:hover .edit-icon {
            color: #4caf50;
        }

        .icon-btn:hover .delete-icon {
            color: darkred;
        }
    </style>


<div class="position-relative">
    <div class="container">
        <div class="card">
            <!-- Heading with icon similar to screenshot -->
            <div class="heading">
                <div class="heading-icon">
                    <i class="fas fa-users"></i> <!-- Icon beside "All Users" -->
                </div>
                <h1>All Users</h1>
            </div>

            <!-- Filter and select role -->
            <form method="GET" action="{{ route('admin.show_users') }}">
                <label for="role">Select Role:</label>
                <select name="role" id="role" onchange="this.form.submit()">
                    <option value="all" {{ $selectedRole == 'all' ? 'selected' : '' }}>All Roles</option>
                    @foreach ($roles as $roleId => $roleName)
                        <option value="{{ $roleId }}" {{ $selectedRole == $roleId ? 'selected' : '' }}>{{ $roleName }}</option>
                    @endforeach
                </select>
            </form>

            <!-- Responsive table similar to "Entry Passes" screenshot -->
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="userTable">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td>
                                <a href="#" class="btn btn-sm icon-btn" style="text-decoration: none;">
    <i class="fas fa-eye view-icon"></i>
</a>
<a href="#" class="btn btn-sm icon-btn" style="text-decoration: none;">
    <i class="fas fa-edit edit-icon"></i>
</a>
<form method="POST" action="#" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm icon-btn" style="text-decoration: none;">
        <i class="fas fa-trash delete-icon"></i>
    </button>
</form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        title: 'User Details'
                    },
                    {
                        extend: 'csv',
                        title: 'User Details'
                    },
                    {
                        extend: 'excel',
                        title: 'User Details'
                    },
                    {
                        extend: 'pdf',
                        title: 'User Details',
                        customize: function(doc) {
                            doc.styles.title = {
                                fontSize: '18',
                                alignment: 'center'
                            };
                        }
                    },
                    {
                        extend: 'print',
                        title: 'User Details'
                    }
                ],
                order: [[0, 'asc']],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records"
                }
            });
        });
    </script>
@endsection

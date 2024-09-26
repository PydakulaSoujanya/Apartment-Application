<style>
    .container h3 {
        margin-top: -40px;
    }

    .container {
        font-size: 14px;
    }

    .container table {
        font-size: 14px;
        width: 100%;
    }

    /* Ensure the table is scrollable on smaller screens */
    .table-responsive {
        overflow-x: auto;
    }

    /* Adjust button size and margin for smaller screens */
    @media (max-width: 768px) {
        #create-button {
            margin-top: 10px;
            width: 100%;
        }

        .container h3 {
            margin-top: 0;
            font-size: 20px;
        }

        .container {
            font-size: 12px;
        }

        table thead th {
            font-size: 12px;
        }

        table tbody td {
            font-size: 12px;
        }
    }

    @media (max-width: 576px) {
        .container h3 {
            font-size: 18px;
        }

        .container {
            font-size: 11px;
        }

        table thead th {
            font-size: 11px;
        }

        table tbody td {
            font-size: 11px;
        }
    }
</style>

@extends('layouts.manager')


@section('title', 'View Entry Passes')

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
        <h3>Entry Passes</h3>
        <a href="{{ route('resident.entry-passes.create') }}" class="btn btn-primary" id="create-button">Create Pass</a>
    </div><br>

    @if($entryPasses->isEmpty())
        <div class="alert alert-info mt-3">No entry passes found.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered mt-5" id="entryPassTable">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Category</th>
                        <th>Visitor Name</th>
                        <th>Phone Number</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Total Days</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entryPasses as $index => $pass)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pass->category }}</td>
                            <td>{{ $pass->visitor_name }}</td>
                            <td>{{ $pass->phone_number }}</td>
                            <td>{{ \Carbon\Carbon::parse($pass->from_date)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($pass->to_date)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($pass->from_date)->diffInDays(\Carbon\Carbon::parse($pass->to_date)) + 1 }}</td>
                            <td>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    $('#entryPassTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                title: 'Visitor Details'
            },
            {
                extend: 'csv',
                title: 'Visitor Details'
            },
            {
                extend: 'excel',
                title: 'Visitor Details'
            },
            {
                extend: 'pdf',
                title: 'Visitor Details',
                customize: function(doc) {
                    doc.styles.title = {
                        fontSize: '18',
                        alignment: 'center'
                    };
                }
            },
            {
                extend: 'print',
                title: 'Visitor Details'
            }
        ],
        order: [[0, 'asc']], // Customize the default ordering if needed
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records"
        },
        paging: true, // Enable pagination
        searching: true, // Enable search box
        info: true // Display information about the table
    });
});

function confirmDelete() {
    return confirm('Are you sure you want to delete this entry pass?');
}
</script>

<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
@endsection

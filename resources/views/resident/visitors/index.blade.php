<style>
 
/* 
   .icon-container {
    position: absolute;
    top: -20px; 
    left: 20px; 
    background-color: #6c757d; 
    color: white;
    padding: 15px;
    border-radius: 10%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 10;
}

.icon-container i {
    font-size: 24px;
}


.card-header {
    margin-left: 60px; 
    position: relative;
}


.card-header h3 {
    margin-left: 30px; 
}

.card {
    position: relative;
    z-index: 1;
} */












    .container h3 {
        margin-top: -60px;
    }

    .container {
        font-size: 13px;
        font-family: Roboto, Helvetica, Arial, sans-serif;
        
    }

    .container table {
        font-size: 13px;
        width: 100%;
        font-family: Roboto, Helvetica, Arial, sans-serif;
    }

    /* Ensure the table is scrollable on smaller screens */
    .table-responsive {
        overflow-x: auto;
    }

 /* Icon button styles */
.icon-btn {
    background-color: transparent;
    border: none;
    padding: 0;
    margin-right: -1px; /* Reduce the margin to decrease space between icons */
}

.icon-btn:last-child {
    margin-right: 0; /* Ensure the last icon has no extra margin */
}

.icon-btn i {
    font-size: 1.2em; /* Adjust the size of the icon */
}

/* Color for each icon */
.view-icon {
    color: #0976b4;
}

.edit-icon {
    color: green;
}

.delete-icon {
    color: red;
}

/* Optional: Add hover effects */
.icon-btn:hover .view-icon {
    color: #9c27b0;
}

.icon-btn:hover .edit-icon {
 color: #4caf50;;
}

.icon-btn:hover .delete-icon {
    color: darkred;
}

/* Optional: Remove focus outline */
.icon-btn:focus {
    outline: none;
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

<!-- resources/views/visitors/index.blade.php -->
@extends('layouts.resident')

@section('title', 'Visitors')

@section('content')
<div class="position-relative">
    <!-- Icon Container -->
    <div class="icon-container">
        <i class="fas fa-user-friends"></i>
    </div>
    <!-- Card with Visitors List -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0 font-weight-bold">Visitors</h3>
            <a href="{{ route('resident.visitors.create') }}" class="btn btn-primary">+ Add Visitor</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="visitorTable">
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Flat No.</th>
                            <th>Resident Name</th>
                            <th>Visitor contact</th>
                            <th>Visiting Reason</th>
                            <th>Visiting Date</th>
                            <th>Expected Timings</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visitors as $visitor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $visitor->flat_number }}</td>
                                <td>{{ $visitor->resident_name }}</td>
                                <td>{{ $visitor->visitor_name }}<br>{{ $visitor->visitor_number }}</td>
                                <td>{{ $visitor->visiting_reason }}</td>
                                <td>{{ \Carbon\Carbon::parse($visitor->visiting_date)->format('d-m-Y') }}</td>
                                <td>{{ $visitor->start_time }} to {{ $visitor->end_time }}</td>
                                <td>
                                    <a href="{{ route('resident.visitors.show', $visitor->id) }}" class="btn btn-sm icon-btn">
                                        <i class="fas fa-eye view-icon"></i>
                                    </a>
                                    <a href="{{ route('resident.visitors.edit', $visitor->id) }}" class="btn btn-sm icon-btn">
                                        <i class="fas fa-edit edit-icon"></i>
                                    </a>
                                    <form method="POST" action="{{ route('resident.visitors.destroy', $visitor->id) }}" onsubmit="return confirm('Are you sure you want to delete this visitor?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm icon-btn">
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

<script>
$(document).ready(function() {
    $('#visitorTable').DataTable({
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
        order: [[0, 'asc']],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records"
        }
    });
});
</script>

@endsection

<!-- Include DataTables CSS & JS and Bootstrap JS as before -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
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

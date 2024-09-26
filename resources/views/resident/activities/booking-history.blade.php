@extends('layouts.resident')

@section('title', 'Visitors')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold">Booking History</h3>
        <a href="{{ route('resident.activities.index') }}" class="btn btn-primary booking-history-btn">Back to Booking</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-body">
        <div class="table-responsive">
            <table id="visitorTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Facility</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Booked For</th>
                        <th>Community Purpose</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Amphitheatre</td>
                        <td>11-Sep-2024</td>
                        <td>10:00 AM - 12:00 PM</td>
                        <td>John Doe</td>
                        <td>Yes</td>
                      
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>GYM</td>
                        <td>11-Sep-2024</td>
                        <td>10:00 AM - 12:00 PM</td>
                        <td>Doe</td>
                        <td>Yes</td>
                        
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Test</td>
                        <td>11-Sep-2024</td>
                        <td>10:00 AM - 12:00 PM</td>
                        <td>John</td>
                        <td>Yes</td>
                       
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include DataTables JS and custom configuration -->
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    $('#visitorTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                title: 'Booking History'
            },
            {
                extend: 'csv',
                title: 'Booking History'
            },
            {
                extend: 'excel',
                title: 'Booking History'
            },
            {
                extend: 'pdf',
                title: 'Booking History',
                customize: function(doc) {
                    doc.styles.title = {
                        fontSize: '18',
                        alignment: 'center'
                    };
                }
            },
            {
                extend: 'print',
                title: 'Booking History'
            }
        ],
        order: [[0, 'asc']], // Customize the default ordering
        language: {
            search: "INPUT",
            searchPlaceholder: "Search records"
        },
        paging: true, // Enable pagination
        searching: true, // Enable search box
        info: true // Display information about the table
    });
});
</script>
@endsection
@endsection
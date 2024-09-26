@extends('layouts.watchman')

@section('title', 'Visitor List')

@section('content')
<div class="container">
    <h1>Visitor List</h1>
    
    <!-- DataTable -->
    <table id="example" class="table table-striped table-bordered mt-2" style="width:100%">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Flat Number</th>
                <th>Resident Name</th>
                <th>Visitor Name &Phone Number</th>
                <!-- <th>Visitor </th> -->
                <th>Visiting Reason</th>
                <th>Visiting Date</th>
                <th>Expected Timings</th>
                <th>Check-In Time</th>
                <th>Check-Out Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $visitor->flat_number }}</td>
                    <td>{{ $visitor->resident_name }}</td>
                    <td>{{ $visitor->visitor_name}}, {{$visitor->visitor_number }}</td>
                    <!-- <td>{{ $visitor->visitor_number }}</td> -->
                    <td>{{ $visitor->visiting_reason }}</td>
                    <td>{{ \Carbon\Carbon::parse($visitor->visiting_date)->format('d-m-Y') }}</td>
                    <td>{{ $visitor->start_time }} to {{ $visitor->end_time }}</td>
                    
                    <td>
                        @if(!$visitor->checkin_time)
                            <form action="{{ route('watchman.visitor.checkin.time', $visitor->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Check-In</button>
                            </form>
                        @else
                            {{ \Carbon\Carbon::parse($visitor->checkin_time)->format('d-m-Y H:i') }}
                        @endif
                    </td>
                    
                    <td>
                        @if($visitor->checkin_time && !$visitor->checkout_time)
                            <form action="{{ route('watchman.visitor.checkout.time', $visitor->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Check-Out</button>
                            </form>
                        @elseif($visitor->checkout_time)
                            {{ \Carbon\Carbon::parse($visitor->checkout_time)->format('d-m-Y H:i') }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('styles')
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap4.css">
@endpush

@push('scripts')
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap4.js"></script>

<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#example').DataTable({
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
                search: "INPUT",
                searchPlaceholder: "Search records", 
            },
            paging: true, // Enable pagination
            searching: true, // Enable search bar
            info: true, // Show info about the table
            lengthChange: true // Allow the user to change the number of entries per page
        });
    });
</script>
@endpush
@endsection
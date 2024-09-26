@extends('layouts.watchman')

@section('title', 'All Visitors')

@section('content')
<script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>

<div class="d-flex justify-content-between align-items-center flex-wrap">
    <h3 class="mb-3">All Visitors</h3>
</div><br>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Responsive Table -->
<div class="table-responsive">
    <table class="table table-bordered" id="visitorTable">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Flat No.</th>
                <th>Resident Name</th>
                <th>Visitor Contact</th>
                <th>Visiting Reason</th>
                <th>Visiting Date</th>
                <th>Expected Timings</th>
                <th>QR Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $visitor->flat_number }}</td>
                <td>{{ $visitor->resident_name }}</td>
                <td>{{ $visitor->visitor_name }}<br>{{ $visitor->visitor_number }}<br>{{ $visitor->visitor_email }}</td>
                <td>{{ $visitor->visiting_reason }}</td>
                <td>{{ \Carbon\Carbon::parse($visitor->visiting_date)->format('d-m-Y') }}</td>
                <td>{{ $visitor->start_time }} to {{ $visitor->end_time }}</td>
                <td>
                    @if($visitor->qr_code_filename)
                    <img src="{{ asset($visitor->qr_code_filename) }}" alt="QR Code for {{ $visitor->visitor_name }}" style="width: 50px; height: 50px;">
                    @endif
                </td>
                <td>
                    <button class="btn btn-success btn-sm" onclick="openScanner({{ $visitor->id }})">Check-In</button>
                    <a href="{{ route('watchman.visitors.checkout', $visitor->id) }}" class="btn btn-danger btn-sm">Check-Out</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for QR Code Scanner -->
<div class="modal fade" id="qrScannerModal" tabindex="-1" aria-labelledby="qrScannerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="qrScannerModalLabel">Scan QR Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <div id="qr-reader" style="width:100%;"></div>
        <p id="qr-reader-result" class="mt-3"></p>
      </div>
    </div>
  </div>
</div>



<script>
    function openScanner(visitorId) {
        $('#qrScannerModal').modal('show');

        var html5QrCode = new Html5Qrcode("qr-reader");
        html5QrCode.start(
            { facingMode: "environment" },
            { fps: 10, qrbox: { width: 250, height: 250 } },
            (decodedText, decodedResult) => {
                console.log(`Code matched: ${decodedText}`, decodedResult);

                $.ajax({
                    url: `/watchman/visitors/checkin/${visitorId}`,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        qr_code_data: decodedText
                    },
                    success: function(response) {
                        alert('Visitor checked in successfully!');
                        $('#qrScannerModal').modal('hide');
                        html5QrCode.stop();
                    },
                    error: function() {
                        alert('Error during check-in.');
                    }
                });
            },
            (errorMessage) => {
                console.error(errorMessage);
            })
            .catch((err) => {
                console.error("Unable to start scanning.", err);
            });
    }
</script>

<script>
$(document).ready(function() {
    // Initialize the DataTable
    $('#visitorTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', title: 'Visitor Details' },
            { extend: 'csv', title: 'Visitor Details' },
            { extend: 'excel', title: 'Visitor Details' },
            { extend: 'pdf', title: 'Visitor Details', 
                customize: function(doc) {
                    doc.styles.title = { fontSize: '18', alignment: 'center' };
                }
            },
            { extend: 'print', title: 'Visitor Details' }
        ],
        order: [[0, 'asc']],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records"
        }
    });

    // Function to open scanner and handle check-in
    function openScanner(visitorId) {
        // Show the QR Scanner Modal
        $('#qrScannerModal').modal('show');
        
        // When modal is fully visible, initialize the QR scanner
        $('#qrScannerModal').on('shown.bs.modal', function () {
            // Initialize the QR code scanner using Html5Qrcode
            var html5QrCode = new Html5Qrcode("qr-reader");
            
            // Start scanning
            html5QrCode.start(
                { facingMode: "environment" }, // Use the back camera
                {
                    fps: 10, // Frames per second
                    qrbox: { width: 250, height: 250 } // Size of the scanning box
                },
                (decodedText, decodedResult) => {
                    // Handle the scanned QR code data
                    console.log(`Scanned QR Code: ${decodedText}`);

                    // Send scanned data to the server for visitor check-in
                    $.ajax({
                        url: `/watchman/visitors/checkin/${visitorId}`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            qr_code_data: decodedText // Send the scanned QR code data
                        },
                        success: function(response) {
                            alert('Visitor checked in successfully!');
                            $('#qrScannerModal').modal('hide');
                            html5QrCode.stop(); // Stop the QR code scanning
                        },
                        error: function() {
                            alert('Error during check-in.');
                        }
                    });
                },
                (errorMessage) => {
                    // Error handling during scanning
                    console.error(`QR Scanner Error: ${errorMessage}`);
                }
            ).catch((err) => {
                console.error(`QR Scanner failed to start: ${err}`);
            });
        });

        // Stop the scanner when the modal is hidden to free the camera
        $('#qrScannerModal').on('hidden.bs.modal', function () {
            html5QrCode.stop().catch((err) => {
                console.error(`Failed to stop QR Scanner: ${err}`);
            });
        });
    }

    // Attach the openScanner function to check-in buttons
    $('.btn-success').on('click', function() {
        var visitorId = $(this).data('visitor-id');
        openScanner(visitorId);
    });
});


</script>

@endsection

<!-- Include DataTables and Bootstrap CSS/JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

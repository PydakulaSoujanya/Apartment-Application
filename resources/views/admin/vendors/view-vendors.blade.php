
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@extends('layouts.admin')

@section('title', 'Vendors')

@section('content')

<div class="vendors-expense-container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Vendors For Expense</h2>
        <a href="{{ route('admin.vendors.create') }}" class="btn btn-primary">Add Vendor</a>
    </div> 

    <table id="vendorTable" class="table table-bordered table-striped vendors-expense-dataTable">
        <thead class="vendors-expense-table-light">
            <tr>
                <th>Id</th>
                <th>Vendor Name</th>
                <th>Vendor Contact Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>TDS</th>
                <th>GSTIN</th>
                <th>IGST</th>
                <th>CGST</th>
                <th>SGST</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendors as $vendor)
            <tr>
                <td>{{ $vendor->vendor_id }}</td>
                <td>{{ $vendor->vendor_name }}</td>
                <td>{{ $vendor->vendor_contact_name }}</td>
                <td>{{ $vendor->vendor_phone }}</td>
                <td>{{ $vendor->vendor_email }}</td>
                <td>{{ $vendor->tds_rate }}</td>
                <td>{{ $vendor->gstin }}</td>
                <td>{{ $vendor->igst }}</td>
                <td>{{ $vendor->cgst }}</td>
                <td>{{ $vendor->sgst }}</td>
                <td>{{ $vendor->notes }}</td>
                <td>
                    <a href="{{ route('admin.vendors.show', $vendor->id) }}" class="btn btn-info btn-sm" title="View">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.vendors.edit', $vendor->id) }}" class="btn btn-primary btn-sm" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this vendor?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    $(document).ready(function() {
        $('#vendorTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#addVendorBtn').on('click', function() {
            alert('Add Vendor button clicked');
            // Add your functionality for adding a vendor here.
        });
    });
</script>
@endsection

@extends('layouts.resident')

@section('title', 'Document')

@section('content')

<!-- Include Bootstrap CSS and Popper.js for Bootstrap functionality -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    .nav-tabs {
        border-bottom: none;
    }
    .nav-link.active {
        background-color: #ffffff !important;
        border: none !important;
        border-bottom: 3px solid #007bff !important;
    }
    .tab-content {
        margin-top: 20px;
    }
    .card {
        background-color: #fff;
        border: none;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 1.2rem;
        font-weight: bold;
    }
    .card-header .badge {
        background-color: red;
        color: white;
        font-size: 0.8rem;
    }
    .card-body {
        padding: 10px;
    }
    .card-footer {
        font-size: 0.8rem;
        color: gray;
    }
    .search-bar {
        margin-bottom: 20px;
    }
    .header {
        background-color: #007bff;
        color: #fff;
        padding: 10px 0;
        text-align: center;
        font-size: 1.5rem;
        font-weight: bold;
    }
    /* Dropdown fix */
    .dropdown-menu {
        z-index: 1000; /* Ensure dropdown is on top */
    }
</style>

<div class="container mt-4">
    <!-- Tabs for Open and Resolved Requests -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="open-requests-tab" data-toggle="tab" href="#open-requests" role="tab"
                aria-controls="open-requests" aria-selected="true">Open Requests</a>
        </li>
    </ul>

    <div class="container mt-4">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="open-requests" role="tabpanel" aria-labelledby="open-requests-tab">
                <!-- Filter Dropdown -->
                <div class="dropdown mx-2 my-3">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-expanded="false">
                        Filter by: Personal Request
                    </button>
                    <div class="dropdown-menu" aria-labelledby="filterDropdown">
                        <a class="dropdown-item" href="#" data-filter="Personal">Personal</a>
                        <a class="dropdown-item" href="#" data-filter="Community">Community</a>
                    </div>
                    <button class="btn btn-outline-primary ml-2" id="addRequestButton">+</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form for New Request -->
    <div class="container mt-4" id="requestFormContainer" style="display: none;">
        <div class="card">
            <div class="card-header">
                Lodge your request
            </div>
            <div class="card-body">
                <form id="requestForm">
                    <div class="form-group">
                        <label for="requestDescription">Write your Request</label>
                        <textarea class="form-control" id="requestDescription" rows="3" placeholder="Describe your reason for requesting support"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="requestAttachment">Add Attachment</label>
                        <input type="file" class="form-control-file" id="requestAttachment" multiple>
                        <small class="form-text text-muted">Only 5 files of size up to 8MB each can be uploaded.</small>
                    </div>
                    <div class="form-group">
                        <label for="requestOffice">Office</label>
                        <select class="form-control" id="requestOffice">
                            <option>A-0201</option>
                            <option>A-0202</option>
                            <option>A-0203</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requestCategory">Category</label>
                        <select class="form-control" id="requestCategory">
                            <option>Select Category</option>
                            <option>Asset Snag</option>
                            <option>Common Facility Usage</option>
                            <option>Data Correction</option>
                            <option>House Keeping</option>
                            <option>Maintenance Billing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requestDate">Preferred Service Date</label>
                        <input type="date" class="form-control" id="requestDate">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="urgentRequest">
                        <label class="form-check-label" for="urgentRequest">This is urgent!</label>
                    </div>
                    <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Toggle request form
        $('#addRequestButton').on('click', function() {
            $('#requestFormContainer').toggle();
        });

        $('#cancelButton').on('click', function() {
            $('#requestFormContainer').hide();
        });

        // Dropdown functionality
        $('.dropdown-item').on('click', function(e) {
            e.preventDefault();
            var filterText = $(this).data('filter');
            $('#filterDropdown').text('Filter by: ' + filterText);
        });
    });
</script>
@endpush

@push('head-scripts')
<!-- Include necessary scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> <!-- Popper.js 1.x -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush

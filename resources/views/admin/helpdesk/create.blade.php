@extends('layouts.admin')

@section('content')
<style>
    .unique-body {
        background-color: #f4f4f9;
    }

    .unique-container {
        margin: 50px auto;
        padding: 20px;
    }

    .unique-card {
        background-color: #ffffff;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .unique-card-header {
        background-color: #f8f9fa;
        font-size: 1.25rem;
        font-weight: bold;
        padding: 15px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .unique-card-body {
        padding: 20px;
    }

    .unique-form-group {
        margin-bottom: 20px;
    }

    .unique-form-control {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .unique-radio-label {
        font-size: 1rem;
        margin-right: 20px;
    }

    .unique-btn-primary,
    .unique-btn-secondary {
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        border: none;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .unique-btn-primary {
        background-color: #007bff;
    }

    .unique-btn-primary:hover {
        background-color: #0056b3;
    }

    .unique-btn-secondary {
        background-color: #6c757d;
        margin-right: 10px;
    }

    .unique-btn-secondary:hover {
        background-color: #565e64;
    }

    .unique-form-text {
        font-size: 0.875rem;
        color: #6c757d;
    }

    .unique-check-input {
        margin-right: 10px;
    }

    /* Media query for responsiveness */
    @media (max-width: 768px) {
        .unique-container {
            padding: 10px;
            margin-top: 20px;
        }

        .unique-card-body {
            padding: 15px;
        }

        .unique-btn-primary,
        .unique-btn-secondary {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>

<div class="unique-container">
    <div class="unique-card">
        <div class="unique-card-header">
           Create a Request
        </div>
        <div class="unique-card-body">
            <form id="requestForm">
                <!-- Request Type Section -->
                <div class="unique-form-group row">
                    <label for="requestType" class="col-sm-4 col-form-label">Request Type</label>
                    <div class="col-sm-8">
                        <div>
                            <input type="radio" id="personalRequest" name="requestType" value="personal" class="unique-check-input">
                            <label for="personalRequest" class="unique-radio-label">Personal</label>
                            <input type="radio" id="communityRequest" name="requestType" value="community" class="unique-check-input">
                            <label for="communityRequest" class="unique-radio-label">Community</label>
                        </div>
                    </div>
                </div>

                <!-- Write Request -->
                <div class="unique-form-group row">
                    <label for="requestDescription" class="col-sm-4 col-form-label">Write your Request</label>
                    <div class="col-sm-8">
                        <textarea class="unique-form-control" id="requestDescription" rows="3" placeholder="Describe your reason for requesting support"></textarea>
                    </div>
                </div>

                <!-- Add Attachment -->
                <div class="unique-form-group row">
                    <label for="requestAttachment" class="col-sm-4 col-form-label">Add Attachment</label>
                    <div class="col-sm-8">
                        <input type="file" class="unique-form-control-file" id="requestAttachment" multiple>
                        <small class="unique-form-text">Only 5 files of size up to 8MB each can be uploaded.</small>
                    </div>
                </div>

                <!-- Office -->
                <div class="unique-form-group row">
                    <label for="requestOffice" class="col-sm-4 col-form-label">Office</label>
                    <div class="col-sm-8">
                        <select class="unique-form-control" id="requestOffice">
                            <option>A-0201</option>
                            <option>A-0202</option>
                            <option>A-0203</option>
                        </select>
                    </div>
                </div>

                <!-- Category -->
                <div class="unique-form-group row">
                    <label for="requestCategory" class="col-sm-4 col-form-label">Category</label>
                    <div class="col-sm-8">
                        <select class="unique-form-control" id="requestCategory">
                            <option>Select Category</option>
                            <option>Asset Snag</option>
                            <option>Common Facility Usage</option>
                            <option>Data Correction</option>
                            <option>House Keeping</option>
                            <option>Maintenance Billing</option>
                        </select>
                    </div>
                </div>

                <!-- Preferred Service Date -->
                <div class="unique-form-group row">
                    <label for="requestDate" class="col-sm-4 col-form-label">Preferred Service Date</label>
                    <div class="col-sm-8">
                        <input type="date" class="unique-form-control" id="requestDate" placeholder="dd-mm-yyyy">
                    </div>
                </div>

                <!-- Urgent Checkbox -->
                <div class="unique-form-group row">
                    <label class="col-sm-4 col-form-label"></label>
                    <div class="col-sm-8">
                        <input type="checkbox" class="unique-check-input" id="urgentRequest">
                        <label for="urgentRequest">This is urgent!</label>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="unique-form-group row">
                    <div class="col-sm-8 offset-sm-4">
                        <button type="button" class="unique-btn-secondary" id="cancelButton" href="{{ route('admin.helpdesk.opendesk') }}">Cancel</button>
                        <button type="submit" class="unique-btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

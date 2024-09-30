@extends('layouts.admin')

@section('content')
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha384-O1QyH37nVBLm8tG0psL94y0W3iJ5j5VhdSjip5hE4i9U1F+N8gEJhTWElKb7kUsD" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet"> <!-- Bootstrap Icons -->

   
   <style>
        .urgent {
            color: red;
        }

        .due-status-red {
            color: red;
        }

        .due-status-green {
            color: green;
        }

        .table-container {
            overflow-x: auto; /* Enable horizontal scroll */
            white-space: nowrap; /* Prevent text wrapping */
        }

        .hidden {
            display: none;
        }

        /* Spacing between form fields */
        .form-row {
            margin-bottom: 15px;
        }
    </style>


<div class="container">
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Open Requests</h5>
            <a href="{{ route('helpdesk-create') }}" class="btn btn-primary">Add New Parking</a> <!-- Link this to your create activity page -->
        </div>
        <div class="card-body">
            <!-- Responsive table wrapper -->
          


    <!-- <div class="container my-4"> -->
        <!-- Container to hide -->
        <!-- <div id="open-requests-info">
            <h4 class="text-center">Open Requests</h4> -->

            <!-- Create Request Button -->
            <!-- <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('helpdesk-create') }}" class="btn btn-primary">Create Request</a>
            </div> -->

            <h6><strong>Total Open Requests: 20</strong> | 02-04-2024 to 12-09-2024</h6>
        <!-- </div> -->

        <!-- Request Table -->

        
        <div class="table-responsive" id="request-table">
        <table class="table table-striped">
        <!-- <table class="table table-striped table-hover table-bordered text-center align-middle"> -->
    <thead>
        <tr>
            <th>Request No.</th>
            <th>Category</th>
            <th>Request</th>
            <th>Opened On</th>
            <th>By</th>
            <th>Preferred Service Date</th>
            <th>Unit</th>
            <th>Status</th>
            <th>Last Update</th>
            <th>Updated On</th>
            <th>Days</th>
            <th>Due Status</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        <tr data-id="1">
            <td>P152</td>
            <td>Parking</td>
            <td>Parking 113 is allotted</td>
            <td>23-08-24</td>
            <td>Narayanan Vinobha</td>
            <td>25-08-24</td>
            <td>A 0504</td>
            <td>New</td>
            <td>Parking 113 is allotted</td>
            <td>23-08-24</td>
            <td>20</td>
            <td><span class="due-status-red">●</span></td>
            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
        </tr>
        <tr data-id="2">
            <td>P144</td>
            <td>Housekeeping</td>
            <td>There’s a leakage in a pipe passing by...</td>
            <td>01-03-24</td>
            <td>Prasenjit Barman</td>
            <td>01-03-24</td>
            <td>E 0303</td>
            <td>New</td>
            <td>This leakage is worse now. Need immediate attention...</td>
            <td>13-08-24</td>
            <td>195</td>
            <td><span class="due-status-green">●</span></td>
            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
        </tr>
        <tr data-id="3">
            <td>P151</td>
            <td>Parking</td>
            <td>Add my parking details as well...</td>
            <td>01-07-24</td>
            <td>Vishal Gaur</td>
            <td>01-07-24</td>
            <td>C 0501</td>
            <td>New</td>
            <td>Add my parking details as well so I can add my car...</td>
            <td>01-07-24</td>
            <td>73</td>
            <td><span class="due-status-green">●</span></td>
            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
        </tr>
        <tr data-id="4">
            <td>P150</td>
            <td>Parking</td>
            <td>Why I am not able to add my car details...</td>
            <td>01-07-24</td>
            <td>Vishal Gaur</td>
            <td>01-07-24</td>
            <td>C 0501</td>
            <td>New</td>
            <td>Why I am not able to add my car details...</td>
            <td>01-07-24</td>
            <td>73</td>
            <td><span class="due-status-green">●</span></td>
            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
        </tr>
        <tr data-id="5">
            <td>P145</td>
            <td>Security</td>
            <td>Security alarm is malfunctioning</td>
            <td>15-04-24</td>
            <td>Ravi Shankar</td>
            <td>16-04-24</td>
            <td>B 0402</td>
            <td>In Progress</td>
            <td>Security alarm needs to be replaced</td>
            <td>30-08-24</td>
            <td>150</td>
            <td><span class="due-status-red">●</span></td>
            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
        </tr>
        <tr data-id="6">
            <td>P146</td>
            <td>Maintenance</td>
            <td>AC not cooling in living room</td>
            <td>02-06-24</td>
            <td>Neha Sharma</td>
            <td>05-06-24</td>
            <td>D 0705</td>
            <td>In Progress</td>
            <td>Technician scheduled to visit</td>
            <td>12-09-24</td>
            <td>102</td>
            <td><span class="due-status-green">●</span></td>
            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
        </tr>
        <tr data-id="7">
            <td>P147</td>
            <td>Electrical</td>
            <td>Power fluctuation in kitchen</td>
            <td>15-05-24</td>
            <td>Rajeev Kumar</td>
            <td>16-05-24</td>
            <td>F 0803</td>
            <td>New</td>
            <td>Power cuts frequently happening</td>
            <td>30-07-24</td>
            <td>120</td>
            <td><span class="due-status-red">●</span></td>
            <td><button class="btn btn-primary btn-sm view-btn">View</button></td>
        </tr>
    </tbody>
</table>

        </div>

        <!-- Hidden Form -->
        <div id="request-form" class="hidden">
    <form>
        <div class="col-md-12">
            <h4 class="text-center mt-3 mb-3">Request Details</h4>
            <div class="card">
                <div class="card-header">{{ __('Request Details') }}</div>
                <div class="card-body">
                    <div class="row form-row mb-3">
                        <label for="requestNo" class="col-md-4 col-form-label text-md-right">Request No:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="requestNo" readonly>
                        </div>
                    </div>

                    <div class="row form-row mb-3">
                        <label for="category" class="col-md-4 col-form-label text-md-right">Category:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="category" readonly>
                        </div>
                    </div>

                    <div class="row form-row mb-3">
                        <label for="openedOn" class="col-md-4 col-form-label text-md-right">Opened On:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="openedOn" readonly>
                        </div>
                    </div>

                    <div class="row form-row mb-3">
                        <label for="serviceDate" class="col-md-4 col-form-label text-md-right">Preferred Service Date:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="serviceDate" readonly>
                        </div>
                    </div>

                    <div class="row form-row mb-3">
                        <label for="unit" class="col-md-4 col-form-label text-md-right">Unit:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="unit" readonly>
                        </div>
                    </div>

                    <div class="row form-row mb-3">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status:</label>
                        <div class="col-md-8">
                            <select class="form-select" id="status">
                                <option value="Not Started">Not Started</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="description" rows="3" readonly></textarea>
                        </div>
                    </div>

                    <div class="row form-row mb-3">
                        <label for="comments" class="col-md-4 col-form-label text-md-right">Comments:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="comments" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" id="cancel-btn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewButtons = document.querySelectorAll('.view-btn');
            const requestTable = document.getElementById('request-table');
            const requestForm = document.getElementById('request-form');
            const openRequestsInfo = document.getElementById('open-requests-info');

            viewButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Get the respective row data
                    const row = this.closest('tr');
                    const requestNo = row.cells[0].innerText;
                    const category = row.cells[1].innerText;
                    const openedOn = row.cells[3].innerText;
                    const serviceDate = row.cells[5].innerText;
                    const unit = row.cells[6].innerText;
                    const description = row.cells[2].innerText;

                    // Fill the form with the row data
                    document.getElementById('requestNo').value = requestNo;
                    document.getElementById('category').value = category;
                    document.getElementById('openedOn').value = openedOn;
                    document.getElementById('serviceDate').value = serviceDate;
                    document.getElementById('unit').value = unit;
                    document.getElementById('description').value = description;

                    // Hide the table, the create button, and the open requests info
                    requestTable.classList.add('hidden');
                    requestForm.classList.remove('hidden');
                    openRequestsInfo.classList.add('hidden');
                });
            });

            // Cancel button to hide the form and show the table and info
            document.getElementById('cancel-btn').addEventListener('click', function() {
                requestForm.classList.add('hidden');
                requestTable.classList.remove('hidden');
                openRequestsInfo.classList.remove('hidden');
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection

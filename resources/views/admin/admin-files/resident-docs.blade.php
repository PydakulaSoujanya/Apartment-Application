@extends('layouts.admin')

@section('title', 'Admin-files')

@section('content')
    <div class="container">
        <h2>Common Files</h2>

        <!-- Tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="admin-documents-tab" data-bs-toggle="tab"
                data-bs-target="#admin-documents" type="button" role="tab" aria-controls="admin-documents"
                aria-selected="true">Admin Documents</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="resident-documents-tab" data-bs-toggle="tab"
                data-bs-target="#resident-documents" type="button" role="tab" aria-controls="resident-documents"
                aria-selected="false">Resident Documents</button>
            </li>
          </ul>
          

        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent">
            <!-- Admin Documents Tab -->
            <div class="tab-pane fade show active" id="admin-documents" role="tabpanel"
                aria-labelledby="admin-documents-tab">

                <!-- Card for Admin Documents -->
                <div class="card mt-3">
                    <div class="card-header">
                        <p>💡 The following documents are available to those who have admin file access</p>
                        <button class="btn btn-primary upload_button">Upload File</button>
                    </div>
                    <div class="card-body">

                        <!-- Search bar -->
                        <div class="input-group mb-3 file-search">
                            <input type="text" class="form-control" placeholder="Search by folder Name"
                                aria-label="Search">
                        </div>

                        <!-- File list card -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Files 0</h5>
                                <p>No files available.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resident Documents Tab -->
            <div class="tab-pane fade" id="resident-documents" role="tabpanel"
                aria-labelledby="resident-documents-tab">
                <!-- Card for Resident Documents -->
                <div class="card mt-3">
                    <div class="card-header">
                        <p>💡 The following documents are shared with residents
                        </p>
                        <button class="btn btn-primary upload_button">Upload File</button>
                    </div>
                    <div class="card-body">

                        <!-- Search bar -->
                        <div class="input-group mb-3 file-search">
                            <input type="text" class="form-control" placeholder="Search by folder Name"
                                aria-label="Search">
                        </div>

                        <!-- File list card -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Files 0</h5>
                                <p>No files available.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (for tabs functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
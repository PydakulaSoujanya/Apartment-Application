

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .vehicle-category-wrapper {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .vehicle-status-active {
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            padding: 2px 8px;
        }
        .vehicle-status-inactive {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            padding: 2px 8px;
        }
    </style>

@extends('layouts.admin')

@section('title', 'Manage Vehicle Category')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Vehicle Category</h4>
        <button class="btn btn-success" data-toggle="modal" data-target="#vehicleCategoryModal" onclick="openAddModal()">+</button>
    </div>
    <div class="vehicle-category-wrapper">
        <table id="vehicleCategoryTable" class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- Add/Edit Category Modal -->
<div class="modal fade" id="vehicleCategoryModal" tabindex="-1" role="dialog" aria-labelledby="vehicleCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vehicleCategoryModalLabel">Add Vehicle Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="vehicleCategoryForm">
                    <input type="hidden" id="editRowIndex">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" placeholder="Category name">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="saveCategory()">Save Changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .vehicle-category-wrapper {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            overflow-x: auto; /* Add horizontal scroll if necessary */
        }
        .vehicle-status-active {
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            padding: 2px 8px;
        }
        .vehicle-status-inactive {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            padding: 2px 8px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5rem;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        let vehicleCategoryTable;
        let isEditing = false;  // flag to check if we're editing
        let editIndex;

        $(document).ready(function() {
            // Initialize the DataTable and store the reference
            vehicleCategoryTable = $('#vehicleCategoryTable').DataTable();

            // Load categories from localStorage
            loadCategories();
        });

        function loadCategories() {
            // Adding some dummy data
            const categories = [
                { name: 'Sedan', status: 'Active' },
                { name: 'SUV', status: 'Inactive' },
                { name: 'Hatchback', status: 'Active' },
                { name: 'Convertible', status: 'Inactive' }
            ];

            vehicleCategoryTable.clear();  // Clear the table data

            categories.forEach((category, index) => {
                const statusClass = category.status === 'Active' ? 'vehicle-status-active' : 'vehicle-status-inactive';
                vehicleCategoryTable.row.add([ 
                    category.name,
                    `<span class="${statusClass}">${category.status}</span>`,
                    `<button class="btn btn-warning btn-sm mr-1" onclick="editCategory(${index})">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteCategory(${index})">
                        <i class="fas fa-trash"></i>
                    </button>`
                ]);
            });

            vehicleCategoryTable.draw();  // Redraw the table with the updated data
        }

        function openAddModal() {
            // Reset the form fields when opening the modal for adding
            $('#vehicleCategoryForm')[0].reset();
            $('#vehicleCategoryModalLabel').text('Add Vehicle Category');
            isEditing = false;
        }

        function saveCategory() {
            const categories = JSON.parse(localStorage.getItem('categories')) || [];

            // Get the values from the form fields
            const categoryName = $('#categoryName').val();
            const status = $('#status').val();

            // Check if the fields are not empty
            if (categoryName && status) {
                if (isEditing) {
                    categories[editIndex] = { name: categoryName, status: status };
                } else {
                    categories.push({ name: categoryName, status: status });
                }

                localStorage.setItem('categories', JSON.stringify(categories));  // Save to localStorage
                loadCategories();  // Reload the table
                $('#vehicleCategoryModal').modal('hide');  // Close the modal
                $('#vehicleCategoryForm')[0].reset();  // Reset the form fields
            } else {
                alert('Please fill out both fields.');
            }
        }

        function editCategory(index) {
            const categories = JSON.parse(localStorage.getItem('categories')) || [];
            const category = categories[index];

            $('#categoryName').val(category.name);
            $('#status').val(category.status);
            $('#vehicleCategoryModalLabel').text('Edit Vehicle Category');
            $('#editRowIndex').val(index);
            isEditing = true;
            $('#vehicleCategoryModal').modal('show');
        }

        function deleteCategory(index) {
            const categories = JSON.parse(localStorage.getItem('categories')) || [];
            categories.splice(index, 1);
            localStorage.setItem('categories', JSON.stringify(categories));  // Save updated data
            loadCategories();  // Reload the table
        }
    </script>
@endpush

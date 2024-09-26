@extends('layouts.admin')
@section('title', 'Parking')
@section('content')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<style>
    .parking-slot-table-wrapper {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .parking-slot-status-active {
        background-color: #28a745; /* Green for Active */
        color: white;
        border-radius: 5px;
        padding: 2px 8px;
    }
    .parking-slot-status-inactive {
        background-color: #dc3545; /* Red for Inactive */
        color: white;
        border-radius: 5px;
        padding: 2px 8px;
    }
    .parking-slot-availability-yes {
        background-color: #28a745; /* Green for Available */
        color: white;
        border-radius: 5px;
        padding: 2px 8px;
    }
    .parking-slot-availability-no {
        background-color: #dc3545; /* Red for Not Available */
        color: white;
        border-radius: 5px;
        padding: 2px 8px;
    }

    /* Mobile View */
    @media (max-width: 576px) {
        .parking-slot-table-wrapper {
            padding: 10px;
        }
        h4 {
            font-size: 1.2rem;
        }
        .btn {
            font-size: 0.8rem;
        }
    }

    /* Tablet View */
    @media (min-width: 577px) and (max-width: 768px) {
        .parking-slot-table-wrapper {
            padding: 15px;
        }
        h4 {
            font-size: 1.4rem;
        }
        .btn {
            font-size: 0.9rem;
        }
    }

    /* Desktop View */
    @media (min-width: 769px) {
        .parking-slot-table-wrapper {
            padding: 20px;
        }
        h4 {
            font-size: 1.6rem;
        }
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Manage Parking Slots</h4>
<a class="btn btn-primary" href="{{ route('admin.parking-slot.manage-vehicles') }}">Manage Vehicles</a>
        <button class="btn btn-success" onclick="openAddModal()">+</button>
    </div>
</div>

    <div class="parking-slot-table-wrapper table-responsive">
        <table id="categoryTable" class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Slot Name</th>
                    <th>Status</th>
                    <th>Availability</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Slot A</td>
                    <td><span class="parking-slot-status-active">Active</span></td>
                    <td><span class="parking-slot-availability-yes">Yes</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm mr-1"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Slot B</td>
                    <td><span class="parking-slot-status-inactive">Inactive</span></td>
                    <td><span class="parking-slot-availability-no">No</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm mr-1"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Slot C</td>
                    <td><span class="parking-slot-status-active">Active</span></td>
                    <td><span class="parking-slot-availability-yes">Yes</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm mr-1"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- Add/Edit Slot Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add Slot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="categoryForm">
                    <input type="hidden" id="editRowIndex">
                    <div class="form-group">
                        <label for="categoryName">Slot Name</label>
                        <input type="text" class="form-control" id="categoryName" placeholder="Slot name">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <select class="form-control" id="availability">
                            <option>Yes</option>
                            <option>No</option>
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

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
    let categoryTable;
    let isEditing = false;  // flag to check if we're editing
    let editIndex;

    $(document).ready(function() {
        // Initialize the DataTable and store the reference
        categoryTable = $('#categoryTable').DataTable();

        // Load categories from localStorage
        loadCategories();
    });

    function loadCategories() {
        const categories = JSON.parse(localStorage.getItem('categories')) || [];

        categoryTable.clear();  

        categories.forEach((category, index) => {
            const statusClass = category.status === 'Active' ? 'parking-slot-status-active' : 'parking-slot-status-inactive';
            const availabilityClass = category.availability === 'Yes' ? 'parking-slot-availability-yes' : 'parking-slot-availability-no';
            categoryTable.row.add([
                category.name,
                `<span class="${statusClass}">${category.status}</span>`,
                `<span class="${availabilityClass}">${category.availability}</span>`,
                `<button class="btn btn-warning btn-sm mr-1" onclick="editCategory(${index})">
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-danger btn-sm" onclick="deleteCategory(${index})">
                    <i class="fas fa-trash"></i>
                </button>`
            ]).draw(); 
        });
    }

    function openAddModal() {
        // Reset the form fields when opening the modal for adding
        $('#categoryForm')[0].reset();
        $('#addCategoryModalLabel').text('Add Slot');
        isEditing = false;
        $('#addCategoryModal').modal('show');  // Show the modal
    }

    function saveCategory() {
        const categories = JSON.parse(localStorage.getItem('categories')) || [];

        // Get the values from the form fields
        const categoryName = $('#categoryName').val();
        const status = $('#status').val();
        const availability = $('#availability').val();

        // Check if the fields are not empty
        if (categoryName && status && availability) {
            if (isEditing) {
                categories[editIndex] = { name: categoryName, status: status, availability: availability };
            } else {
                categories.push({ name: categoryName, status: status, availability: availability });
            }

            localStorage.setItem('categories', JSON.stringify(categories));  // Save to localStorage
            loadCategories();  // Reload the table
            $('#addCategoryModal').modal('hide');  // Close the modal
            $('#categoryForm')[0].reset();  // Reset the form fields
        } else {
            alert('Please fill out all fields.');
        }
    }

    function editCategory(index) {
        const categories = JSON.parse(localStorage.getItem('categories'));

        // Populate the form with the category's current data
        $('#categoryName').val(categories[index].name);
        $('#status').val(categories[index].status);
        $('#availability').val(categories[index].availability);
        editIndex = index;

        // Update modal title
        $('#addCategoryModalLabel').text('Edit Slot');
        isEditing = true;
        $('#addCategoryModal').modal('show');  // Show the modal
    }

    function deleteCategory(index) {
        const categories = JSON.parse(localStorage.getItem('categories'));

        if (confirm(`Are you sure you want to delete "${categories[index].name}"?`)) {
            categories.splice(index, 1);  // Remove the category from the array
            localStorage.setItem('categories', JSON.stringify(categories));  // Save the updated array
            loadCategories();  // Reload the table
        }
    }
</script>
@endsection

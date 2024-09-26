
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('categories') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <!-- Button trigger modal for adding category -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#categoryModal" data-mode="add">
                        Add Category
                    </button>

                    <!-- Category Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#categoryModal" data-mode="edit" data-id="{{ $category->id }}">Edit</button>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Category Modal -->
                    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="categoryModalLabel">Add/Edit Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" id="categoryForm">
                                    @csrf
                                    @method('POST') <!-- Default method for add -->
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Category Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- JavaScript for handling modal -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    <script>
                        $('#categoryModal').on('show.bs.modal', function (event) {
                            var button = $(event.relatedTarget);
                            var mode = button.data('mode'); // 'add' or 'edit'
                            var id = button.data('id');
                            var modal = $(this);
                            var form = modal.find('form');

                            if (mode === 'edit') {
                                modal.find('.modal-title').text('Edit Category');
                                form.attr('action', '/admin/categories/' + id);
                                form.find('[name="_method"]').val('PUT');

                                // Fetch existing category data
                                $.ajax({
                                    url: '/admin/categories/' + id + '/edit',
                                    success: function (data) {
                                        form.find('[name="name"]').val(data.name);
                                    }
                                });
                            } else {
                                modal.find('.modal-title').text('Add Category');
                                form.attr('action', '/admin/categories');
                                form.find('[name="_method"]').val('POST');
                                form.find('[name="name"]').val('');
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

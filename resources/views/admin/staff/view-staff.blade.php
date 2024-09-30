
@extends('layouts.admin') <!-- Ensure you're extending the correct layout -->

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha384-O1QyH37nVBLm8tG0psL94y0W3iJ5j5VhdSjip5hE4i9U1F+N8gEJhTWElKb7kUsD" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet"> <!-- Bootstrap Icons -->




@section('title', 'Staff')

<div class="container">
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Staff Details</h5>
            <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">Add New Staff</a> <!-- Link this to your create activity page -->
        </div>
        <div class="card-body">
        <div class="table-responsive">


  <table class="table table-stripped">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Languages</th>
        <th>Doj</th>
        <th>Aadhar Number</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($staff as $staffMember)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $staffMember->name }}</td>
        <td>{{ $staffMember->category }}</td>
        <td>{{ $staffMember->gender }}</td>
        <td>{{ $staffMember->contact }}</td>
        <td>{{ $staffMember->email }}</td>
        <td>{{ $staffMember->languages }}</td>
        <td>{{ \Carbon\Carbon::parse($staffMember->doj)->format('d-m-Y') }}</td>
        <td>{{ $staffMember->aadhar }}</td>
        <td>{{ $staffMember->status }}</td>
        <td>
          <!-- View Button with icon -->
          <a href="{{ route('admin.staff.show', $staffMember->id) }}" class="btn btn-info btn-sm">
            <i class="fas fa-eye"></i>
          </a>

          <!-- Edit Button with icon -->
          <a href="{{ route('admin.staff.edit', $staffMember->id) }}" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i>
          </a>

          <!-- Delete Button with confirmation dialog -->
          <form action="{{ route('admin.staff.destroy', $staffMember->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
</div>
<script>
function confirmDelete() {
  return confirm('Are you sure you want to delete this staff member?');
}
</script>

@endsection

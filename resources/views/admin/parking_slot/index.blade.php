@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Parking Slots</h5>
            <a href="{{ route('admin.parking_slot.create') }}" class="btn btn-primary float-end">Add Parking Slot</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Slot No</th>
                        <th>Type</th>
                        <th>Block</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slots as $key => $slot)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $slot->slot_no }}</td>
                        <td>{{ $slot->type }}</td>
                        <td>{{ $slot->block }}</td>
                        <td>{{ $slot->status ? 'Occupied' : 'Free' }}</td>
                        <td>
                            <a href="{{ route('admin.parking_slot.edit', $slot->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.parking_slot.destroy', $slot->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this slot?');">
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
@endsection

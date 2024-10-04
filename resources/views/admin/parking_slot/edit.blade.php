@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Parking Slot</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.parking_slot.update', $parkingSlot->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="slot_no" class="form-label">Slot No</label>
                    <input type="text" class="form-control" id="slot_no" name="slot_no" value="{{ $parkingSlot->slot_no }}" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $parkingSlot->type }}" required>
                </div>
                <div class="mb-3">
                    <label for="block" class="form-label">Block</label>
                    <input type="text" class="form-control" id="block" name="block" value="{{ $parkingSlot->block }}">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="0" {{ !$parkingSlot->status ? 'selected' : '' }}>Free</option>
                        <option value="1" {{ $parkingSlot->status ? 'selected' : '' }}>Occupied</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

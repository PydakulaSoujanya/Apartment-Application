@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Add Parking Slot</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.parking_slot.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="slot_no" class="form-label">Slot No</label>
                    <input type="text" class="form-control" id="slot_no" name="slot_no" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type" name="type" required>
                </div>
                <div class="mb-3">
                    <label for="block" class="form-label">Block</label>
                    <input type="text" class="form-control" id="block" name="block">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="0">Free</option>
                        <option value="1">Occupied</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.flatimport.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Upload Flats Excel File</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>
    </div>
@endsection

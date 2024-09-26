




@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                

                <div class="card-body">
                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Select Category') }}</label>

                        <div class="col-md-6">
                            <select id="category" name="category" class="form-control">
                                <option value="" disabled selected>Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="#" id="submitBtn" class="btn btn-primary" onclick="navigateToRoute()">
                                {{ __('Submit') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function navigateToRoute() {
        var category = document.getElementById("category").value;
        var url = "#"; // Default URL

        // Determine the correct route based on the selected category
        if (category === "manager") {
            url = "{{ route('admin.register.manager') }}";
        } else if (category === "resident") {
            url = "{{ route('admin.register.resident') }}";
        } else if (category === "watchman") {
            url = "{{ route('admin.register.watchman') }}";
        }

        // Redirect to the appropriate route
        if (url !== "#") {
            window.location.href = url;
        } else {
            alert("Please select a valid category.");
        }
    }
</script>
@endsection

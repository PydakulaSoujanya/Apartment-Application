<!-- resources/views/layouts/sidebar.blade.php -->
<div class="col-md-3">
    <div class="sidebar bg-light p-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('manager.home') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('manager.register.resident.form') }}">Register New Manager</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('manager.entrypass') }}">View Entry Passes</a>
            </li>
            <!-- Add more sidebar links here -->
        </ul>
    </div>
</div>

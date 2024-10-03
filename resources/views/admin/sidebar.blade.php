<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <!-- Link to your custom CSS file -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS (Optional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex">
        <div class="d-flex">
    <div class="left-edge-icons">
        <div class="icon-card">
            <i class="bi bi-person icon"></i>
        </div>
        <div class="icon-card">
            <i class="bi bi-bell icon"></i>
        </div>
        <div class="icon-card">
            <i class="bi bi-search icon"></i>
        </div>
        <div class="icon-card">
            <i class="bi bi-plus icon"></i>
        </div>
        <div class="icon-card">
            <i class="bi bi-gear icon"></i>
        </div>
        <div class="icon-card">
            <i class="bi bi-heart icon"></i>
        </div>
        <div class="icon-card">
            <i class="bi bi-file-earmark icon"></i>
        </div>

        <div class="icon-card" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="bi bi-box-arrow-right icon"></i>
        </div>
     
    </div>

    <div class="sidebar d-flex flex-column" id="sidebar">
        <div class="sidebar-header p-3 text-center">
            <img src="{{ asset('images/iiiq-logo.jpeg') }}" alt="Logo" class="sidebar-logo">
            <h5 class="company-name">iiiQBets</h5>
            <i class="bi bi-chevron-left collapse-icon" id="collapseBtn"></i>
        </div>
        <ul class="nav flex-column sidebar-nav">

    <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.home') }}">
            <i class="bi bi-house-door"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.show_users') }}">
            <i class="bi bi-people"></i>
            <span class="nav-text">View Users</span>
            <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
            <i class="bi bi-list-ul"></i>
            <span class="nav-text">Categories</span>
            <i class="bi bi-chevron-down ms-auto"></i>
        </a>
    </li> -->
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.view.residents') }}">
            <i class="bi bi-person-plus"></i>
            <span class="nav-text">New User</span>
            <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
        </a>
    </li>
    
    <li class="nav-item">   
        <a class="nav-link" href="{{ route('expenses.index') }}">
            <i class="bi bi-currency-dollar"></i>
            <span class="nav-text">Expenses</span>
            <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
        </a>
    </li>

            

<li class="nav-item">   
<a class="nav-link" href="{{ route('admin.resident.index') }}">

        <i class="bi bi-cart"></i>
        <span class="nav-text"> Maintenance</span>
        <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
    </a>
</li>

    <li class="nav-item">   
        <a class="nav-link" href="{{ route('admin.flatimport.index') }}">
            <i class="bi bi-building"></i>
            <span class="nav-text">Flats Registration</span>
            <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
        </a>
    </li>

    <li class="nav-item">   
        <a class="nav-link" href="{{ route('admin.facilities.index') }}">
            <i class="bi bi-gear"></i>
            <span class="nav-text">Facilities</span>
            <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
        </a>
    </li>

    <li class="nav-item">   
        <a class="nav-link" href="{{ route('admin.activities.index') }}">
            <i class="bi bi-calendar-check"></i>
            <span class="nav-text">Activities</span>
            <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
        </a>
    </li>

    <li class="nav-item">   
        <a class="nav-link" href="{{ route('admin.parking.index') }}">
            <i class="bi bi-car-front"></i>
            <span class="nav-text">Parking</span>
            <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
        </a>
    </li>
    <li class="nav-item">   
        <a class="nav-link" href="{{ route('admin.watchman-list') }}">
            <i class="bi bi-person-badge"></i>
            <span class="nav-text">Watchman</span>
            <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
        </a>
    </li>
    <li class="nav-item">   
        <a class="nav-link" href="{{ route('admin.secondaryuser-list') }}">
            <i class="bi bi-person-badge"></i>
            <span class="nav-text">SecondaryUser</span>
            <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
        </a>
    </li>

    <li class="nav-item">   
        <a class="nav-link" href="{{ route('admin.helpdesk.opendesk') }}">
            <i class="bi bi-envelope-open"></i>
            <span class="nav-text">Open Request</span>
        </a>
    </li>


<li class="nav-item">   
    <!-- <a class="nav-link" href="{{ route('admin.staff.view-staff') }}"> -->
    <a class="nav-link" href="{{ route('admin.staff.view-staff') }}">
        <i class="bi bi-people"></i>
        <span class="nav-text">Staff Manager</span>
        <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
    </a>
</li>
<li class="nav-item">   
    <a class="nav-link" href="{{ route('admin.vendors.view-vendors') }}">
        <i class="bi bi-shop"></i>
        <span class="nav-text">Vendor Master</span>
        <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
    </a>
</li>
      
<li class="nav-item">   
    <a class="nav-link" href="{{ route('admin.projects.index') }}">
        <i class="bi bi-kanban"></i>
        <span class="nav-text">Projects&Meetings</span>
        
    </a>
</li>
<li class="nav-item">   
    <a class="nav-link" href="{{ route('admin.admin-files.resident-docs') }}">
        <i class="bi bi-files"></i>
        <span class="nav-text">Admin Files</span>
        
    </a>
</li>



    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>

    </div>
</div>

    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <script>
    $(document).ready(function() {
        $('#collapseBtn').click(function() {
            $('#sidebar').toggleClass('collapsed');
        });
    });
</script>
</body>
</html>

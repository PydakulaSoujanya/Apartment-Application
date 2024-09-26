<!-- 
 <div class="col-md-3">
    <div class="sidebar bg-light p-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('superadmin.home') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('superadmin.register.admin.form') }}">Register New Admin</a>
            </li>

        </ul>
    </div>
</div>  -->

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
    <style>
        #sidebar {
            width: 250px;
            min-height: 100vh;
            transition: width 0.3s ease; /* Smooth transition for collapse effect */
        }

        #sidebar.collapsed {
            width: 80px; /* Adjusted width when collapsed */
        }

        .collapsed .nav-text {
            display: none; /* Hide the text in collapsed state */
        }

        .collapsed .sidebar-logo {
            width: 50px; /* Smaller logo in collapsed state */
            height: 50px;
        }

        .collapsed .collapse-icon {
            transform: rotate(180deg); /* Rotate icon when collapsed */
        }

        .profile-width {
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <div class="d-flex">
            <div class="left-edge-icons">
                <div class="icon-container">
                    <i class="bi bi-person icon"></i>
                </div>
                <div class="icon-container">
                    <i class="bi bi-bell icon"></i>
                </div>
                <div class="icon-container">
                    <i class="bi bi-search icon"></i>
                </div>
                <div class="icon-container">
                    <i class="bi bi-plus icon"></i>
                </div>
                <div class="icon-container">
                    <i class="bi bi-gear icon"></i>
                </div>
                <div class="icon-container">
                    <i class="bi bi-heart icon"></i>
                </div>
                <div class="icon-container">
                    <i class="bi bi-file-earmark icon"></i>
                </div>
                <div class="icon-container" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="bi bi-box-arrow-right icon"></i>
        </div>
            </div>

            <div class="sidebar d-flex flex-column" id="sidebar">
                <div class="sidebar-header p-3 text-center">
                    <img src="{{ asset('images/iiiq-logo.jpeg') }}" alt="Logo" class="sidebar-logo" >
                    <h5 class="company-name">iiiQBets.</h5>
                    <i class="bi bi-chevron-left collapse-icon" id="collapseBtn"></i>
                </div>
                <ul class="nav flex-column sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('superadmin.home') }}">
                            <i class="bi bi-house-door"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('superadmin.register.admin.form') }}">
                        <i class="bi bi-person"></i>
                            <span class="nav-text">Register New Admin</span>
                        </a>
                    </li>
                    <!-- Additional Nav Items Here -->
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vanilla JavaScript for toggling collapse -->
    <script>
        document.getElementById('collapseBtn').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('collapsed');
        });
    </script>
</body>

</html>


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
            <img src="{{ asset('images/iiiq-logo.jpeg') }}" alt="Logo" class="sidebar-logo">
            <h5 class="company-name">iiiQBets.</h5>
            <i class="bi bi-chevron-left collapse-icon" id="collapseBtn"></i>
        </div>
        <ul class="nav flex-column sidebar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="bi bi-house-door"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('watchman.visitors.index') }}">
                    <i class="bi bi-box"></i>
                    <span class="nav-text">Visitors</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="bi bi-cart"></i>
                    <span class="nav-text">Entry Passes</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li> -->
            <!-- <li class="nav-item">
    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-truck"></i>
        <span class="nav-text">Logout</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
</li> -->

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>   <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-truck"></i>
                    <span class="nav-text">Purchases</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-people"></i>
                    <span class="nav-text">HR</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-bank"></i>
                    <span class="nav-text">Banking</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-graph-up"></i>
                    <span class="nav-text">Reports</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-rocket"></i>
                    <span class="nav-text">Apps</span>
                </a>
            </li> -->

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

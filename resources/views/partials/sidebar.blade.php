<!-- resources/views/partials/sidebar.blade.php -->
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
    </div>

    <div class="sidebar d-flex flex-column" id="sidebar">
        <div class="sidebar-header p-3 text-center">
            <img src="{{ asset('images/company logo.png') }}" alt="Logo" class="sidebar-logo">
            <h5 class="company-name">IIIQBETS.</h5>
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
                <a class="nav-link" href="#">
                    <i class="bi bi-box"></i>
                    <span class="nav-text">Inventory</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-cart"></i>
                    <span class="nav-text">Sales</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li class="nav-item">
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
            </li>
        </ul>
    </div>
</div>

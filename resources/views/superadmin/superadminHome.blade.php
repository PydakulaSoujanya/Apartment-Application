<!-- resources/views/superadmin/superadminHome.blade.php -->



@section('content')
<div class="d-flex">
    <!-- Include Sidebar -->
    @include('superadmin.sidebar')
    @extends('layouts.app')

    <!-- Main Content Area -->
    <!-- <div class="col-md-5 profile-width">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h2>You are a SuperAdmin.</h2>

      
                <p class="mt-4">
                    <strong>Name:</strong> {{ Auth::user()->name }}
                </p>
                <p>
                    <strong>Email:</strong> {{ Auth::user()->email }}
                </p>
            </div>
        </div>
    </div> -->

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .super-admin-dashboard-card-body {
            background-color: #f8f9fa;
        }
        .super-admin-dashboard-card {
            margin-bottom: 20px; /* Gap between rows */
            display: flex;
            flex-direction: column;
            height: 100%;
            border-radius: 0.5rem; /* Border radius for cards */
            overflow: hidden; /* Ensures border radius is applied to content */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Box shadow for cards */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animation on hover */
        }
        .super-admin-dashboard-card-body {
            flex: 1;
            padding: 20px;
        }
        .super-admin-dashboard-card:hover {
            transform: scale(1.05); /* Slightly scales up the card */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Enhances the shadow */
        }
        .super-admin-dashboard-card-gap-bottom {
            margin-bottom: 30px; /* Extra gap at the bottom */
        }
        .super-admin-dashboard-title {
            margin-top: 40px; /* Increased space between header and cards */
            text-align: center;
        }
        .super-admin-dashboard-chart-container {
            width: 100%;
            height: 250px;
            max-width: 400px;
            margin: 0 auto;
        }
        .super-admin-dashboard-card-header {
            text-align: center; /* Center header text */
            padding: 20px; /* Increased padding for better visual appeal */
            color: #ffffff; /* White text color for better contrast */
        }
        /* Custom background colors for specific cards */
        .super-admin-dashboard-bg-blue {
            background-color: #007bff !important; /* Blue */
        }
        .super-admin-dashboard-bg-cyan {
            background-color: #17a2b8 !important; /* Cyan */
        }
        .super-admin-dashboard-bg-orange {
            background-color: #fd7e14 !important; /* Orange */
        }
        .super-admin-dashboard-bg-purple {
            background-color: #6f42c1 !important; /* Purple */
        }
        .super-admin-dashboard-bg-light-blue {
            background-color: #cce5ff !important; /* Light Blue */
            color: #003366; /* Dark Blue */
        }
        .super-admin-dashboard-bg-light-green {
            background-color: #d4edda !important; /* Light Green */
            color: #004d00; /* Dark Green */
        }
        .super-admin-dashboard-bg-light-yellow {
            background-color: #fff3cd !important; /* Light Yellow */
            color: #856404; /* Dark Yellow */
        }
        .super-admin-dashboard-bg-light-red {
            background-color: #f8d7da !important; /* Light Red */
            color: #721c24; /* Dark Red */
        }
        .super-admin-dashboard-header-icons {
            font-size: 1.5rem;
            color: #333333;
        }
        .super-admin-dashboard-profile-img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>

    <!-- Dashboard Title -->
    <!-- <div class="container"> -->
       
    <!-- </div> -->

 
    
    <div class="container" id="super-admin-dashboard">
        <!-- Header Section -->
        <h1 class="super-admin-dashboard-title">Super Admin Dashboard</h1>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h2>Hi, Welcome back 👋</h2>
            <div class="d-flex align-items-center">
                <!-- Search Bar -->
                <div class="me-3">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <div class="d-flex align-items-center ms-3">
                    <div class="me-3">
                        <select class="form-select" aria-label="Country Selector">
                            <option selected>🇺🇸 English</option>
                            <option value="1">🇫🇷 French</option>
                            <option value="2">🇪🇸 Spanish</option>
                            <option value="3">🇩🇪 German</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-bell super-admin-dashboard-header-icons" style="cursor: pointer;"></i>
                    </div>
                    <div class="dropdown">
                        <i class="bi bi-person-circle super-admin-dashboard-header-icons dropdown-toggle" style="cursor: pointer;" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><h6 class="dropdown-header">John Doe</h6></li>
                            <li><span class="dropdown-item-text">Username: johndoe</span></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Cards Section -->
        <div class="row mt-5">
            <!-- Weekly Sales Card -->
            <div class="col-12 col-md-3 mb-4">
                <div class="card card-sales p-3 super-admin-dashboard-card">
                    <div class="super-admin-dashboard-card-header super-admin-dashboard-bg-blue">
                        <h4>User Administration</h4>
                    </div>
                    <div class="super-admin-dashboard-card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2>714k</h2>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">+2.6%</p>
                            <small>Last Week</small>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- New Users Card -->
            <div class="col-12 col-md-3 mb-4">
                <div class="card card-users p-3 super-admin-dashboard-card">
                    <div class="super-admin-dashboard-card-header super-admin-dashboard-bg-cyan">
                        <h4>Financial Summary</h4>
                    </div>
                    <div class="super-admin-dashboard-card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2>1.35m</h2>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">-0.1%</p>
                            <small>Last Week</small>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Purchase Orders Card -->
            <div class="col-12 col-md-3 mb-4">
                <div class="card card-orders p-3 super-admin-dashboard-card">
                    <div class="super-admin-dashboard-card-header super-admin-dashboard-bg-orange">
                        <h4>Key Reports</h4>
                    </div>
                    <div class="super-admin-dashboard-card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2>1.72m</h2>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">+2.8%</p>
                            <small>Last Week</small>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Messages Card -->
            <div class="col-12 col-md-3 mb-4">
                <div class="card card-messages p-3 super-admin-dashboard-card">
                    <div class="super-admin-dashboard-card-header super-admin-dashboard-bg-purple">
                        <h4>Communication Tool</h4>
                    </div>
                    <div class="super-admin-dashboard-card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2>234</h2>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">+3.6%</p>
                            <small>Last Week</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Additional Cards Section -->
        <div class="row g-3">
            <!-- Financial Summary (Pie Chart) -->
            <div class="col-lg-6 col-md-12 super-admin-dashboard-card-gap-bottom">
                <div class="super-admin-dashboard-card">
                    <div class="super-admin-dashboard-card-header super-admin-dashboard-bg-light-blue">
                        <h5>Financial Summary</h5>
                    </div>
                    <div class="super-admin-dashboard-card-body">
                        <div class="super-admin-dashboard-chart-container">
                            <canvas id="superAdminFinancialPieChart"></canvas>
                        </div>
                        <ul id="superAdminFinancialSummary">
                            <li><strong>Total Income:</strong> ₹64,000</li>
                            <li><strong>Total Expenses:</strong> ₹28,000</li>
                            <li><strong>Pending Dues:</strong> ₹5,000</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Occupancy Rate (Bar Graph) -->
            <div class="col-lg-6 col-md-12 super-admin-dashboard-card-gap-bottom">
                <div class="super-admin-dashboard-card">
                    <div class="super-admin-dashboard-card-header super-admin-dashboard-bg-light-green">
                        <h5>Occupancy Rate by Block</h5>
                    </div>
                    <div class="super-admin-dashboard-card-body">
                        <div class="super-admin-dashboard-chart-container">
                            <canvas id="superAdminOccupancyBarChart"></canvas>
                        </div>
                        <ul id="superAdminOccupancyRate">
                            <li><strong>Block A:</strong> 82%</li>
                            <li><strong>Block B:</strong> 84%</li>
                            <li><strong>Block C:</strong> 88%</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Maintenance Requests (Doughnut Chart) -->
            <div class="col-lg-6 col-md-12 super-admin-dashboard-card-gap-bottom">
                <div class="super-admin-dashboard-card">
                    <div class="super-admin-dashboard-card-header super-admin-dashboard-bg-light-yellow">
                        <h5>Maintenance Requests</h5>
                    </div>
                    <div class="super-admin-dashboard-card-body">
                        <div class="super-admin-dashboard-chart-container">
                            <canvas id="superAdminMaintenanceRequestsChart"></canvas>
                        </div>
                        <ul id="superAdminMaintenanceRequests">
                            <li><strong>Pending:</strong> 45</li>
                            <li><strong>Completed:</strong> 120</li>
                            <li><strong>Overdue:</strong> 10</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Website Visits (Line Graph) -->
            <div class="col-lg-6 col-md-12 super-admin-dashboard-card-gap-bottom">
                <div class="super-admin-dashboard-card">
                    <div class="super-admin-dashboard-card-header super-admin-dashboard-bg-light-red">
                        <h5>Website Visits</h5>
                    </div>
                    <div class="super-admin-dashboard-card-body">
                        <div class="super-admin-dashboard-chart-container">
                            <canvas id="superAdminWebsiteVisitsChart"></canvas>
                        </div>
                        <ul id="superAdminWebsiteVisitsStats">
                            <li><strong>Total Visits:</strong> 1.2m</li>
                            <li><strong>Unique Visitors:</strong> 850k</li>
                            <li><strong>Returning Visitors:</strong> 350k</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
        <footer>
            <div class="container mt-5">
                <div class="row">
                    <!-- Footer Links Card -->
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="card p-3 super-admin-dashboard-card bg-light">
                            <h5 class="text-center">Quick Links</h5>
                            <div class="footer-links text-center">
                                <a href="#">About</a> |
                                <a href="#">Contact</a> |
                                <a href="#">Privacy Policy</a> |
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
        
                    <!-- Footer Social Media Icons Card -->
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="card p-3 super-admin-dashboard-card bg-light">
                            <h5 class="text-center">Follow Us</h5>
                            <div class="social-icons text-center">
                                <a href="#" class="bi bi-facebook mx-2"></a>
                                <a href="#" class="bi bi-twitter mx-2"></a>
                                <a href="#" class="bi bi-instagram mx-2"></a>
                                <a href="#" class="bi bi-linkedin mx-2"></a>
                            </div>
                        </div>
                    </div>
        
                    <!-- Footer Copyright Card -->
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="card p-3 super-admin-dashboard-card bg-light">
                            <h5 class="text-center">Copyright</h5>
                            <p class="text-center">&copy; 2024 Your Company. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Extra space below the footer -->
            <div class="mb-5"></div>
        </footer>
        
        <!-- Placeholder for additional cards or content if needed -->  
    </div>

    <script>
        // Initialize charts
        var ctxPie = document.getElementById('superAdminFinancialPieChart').getContext('2d');
        var ctxBar = document.getElementById('superAdminOccupancyBarChart').getContext('2d');
        var ctxLine = document.getElementById('superAdminWebsiteVisitsChart').getContext('2d');
        var ctxRequests = document.getElementById('superAdminMaintenanceRequestsChart').getContext('2d');

        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Income', 'Expenses', 'Dues'],
                datasets: [{
                    data: [64000, 28000, 5000],
                    backgroundColor: ['#36a2eb', '#ff6384', '#ffce56'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ₹' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Block A', 'Block B', 'Block C'],
                datasets: [{
                    label: 'Occupancy Rate',
                    data: [82, 84, 88],
                    backgroundColor: '#4caf50',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Website Visits',
                    data: [100000, 120000, 130000, 140000, 150000, 160000, 170000],
                    borderColor: '#42a5f5',
                    backgroundColor: 'rgba(66, 165, 245, 0.2)',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' visits';
                            }
                        }
                    }
                }
            }
        });

        new Chart(ctxRequests, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Completed', 'Overdue'],
                datasets: [{
                    data: [45, 120, 10],
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffce56'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

      
</div>

@endsection



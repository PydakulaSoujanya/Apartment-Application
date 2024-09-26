@extends('layouts.admin')

@section('content')
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Flatpickr CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        /* Scoped Styles for Admin Dashboard */
        .admin-dashboard {
            background-color: #f4f6f9;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        .admin-dashboard .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #fff;
        }

        .admin-dashboard .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
        }

        .admin-dashboard .dashboard-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #007bff;
        }

        .admin-dashboard .section-content {
            font-size: 15px;
            color: #6c757d;
        }

        .admin-dashboard .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #007bff;
        }

        .admin-dashboard .icon-card {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .admin-dashboard .icon-container i {
            font-size: 30px;
            margin-right: 15px;
            color: #007bff;
        }

        .admin-dashboard .icon-card span {
            font-size: 18px;
            font-weight: 500;
            color: #333;
        }

        .admin-dashboard .btn-custom {
            background-color: #007bff;
            color: #fff;
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .admin-dashboard .btn-custom:hover {
            background-color: #0056b3;
        }

        .admin-dashboard .accounting-header {
            font-size: 24px;
            font-weight: 700;
            margin: 40px 0 20px;
            color: #333;
        }

        .admin-dashboard .equal-height {
            display: flex;
            flex-wrap: wrap;
        }

        .admin-dashboard .equal-height .col-md-6 {
            display: flex;
            flex-direction: column;
        }
        .col-md-6{
            flex: 0 0 50%;
            max-width: 88%;
        }

        .admin-dashboard .equal-height .card {
            flex: 1;
        }

        .admin-dashboard .chart-container {
            width: 100%;
            height: 250px;
        }

        .admin-dashboard .stat-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .admin-dashboard .stat-label {
            font-size: 16px;
            color: #6c757d;
        }

        .admin-dashboard .text-red {
            color: #dc3545;
        }

        .admin-dashboard .text-green {
            color: #28a745;
        }

        .admin-dashboard .text-center {
            text-align: center;
        }

        @media (max-width: 1024px) {
        .col-md-6{
            flex: 0 0 50%;
            max-width: 88%;
        }
    }

        @media (max-width: 768px) {
            .admin-dashboard .icon-card {
                flex-direction: column;
                align-items: center;
            }

            .admin-dashboard .icon-card i {
                margin-bottom: 10px;
            }

            .admin-dashboard .row {
                flex-direction: column;
                align-items: center;
            }

            .admin-dashboard .col-md-4 {
                width: 100%;
                max-width: 360px; /* Adjust max-width as needed */
            }
        }
    </style>

<body class="admin-dashboard">

<div class="container mt-2">
    <!-- Header Icons -->
    <div class="row">
        <!-- SMS -->
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <div class="icon-card justify-content-center">
                    <i class="fas fa-sms"></i>
                </div>
                <h5 class="mt-3">SMS</h5>
                <p class="section-content">Send SMS to Members</p>
            </div>
        </div>
        <!-- Instant Notification -->
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <div class="icon-card justify-content-center">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <h5 class="mt-3">Instant Notification</h5>
                <p class="section-content">Send Instant App Notification</p>
            </div>
        </div>
        <!-- Post Announcement -->
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <div class="icon-card justify-content-center">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <h5 class="mt-3">Post Announcement</h5>
                <p class="section-content">Post Announcement</p>
            </div>
        </div>
    </div>

    <!-- Units & Users and Helpdesk Tracker -->
    <div class="row equal-height">
        <!-- Units & Users -->
        <div class="col-md-4 col-lg-6">
            <div class="card p-4 text-center">
                <h5 class="dashboard-title">Units & Users</h5>
                <div class="stat-row">
                    <div>
                        <p class="stat-label">Unique Users</p>
                        <p class="stat-number">306</p>
                    </div>
                    <div>
                        <p class="stat-label">Total Units</p>
                        <p class="stat-number">190</p>
                    </div>
                </div>
                <p class="section-content">
                    <i class="fas fa-user-clock"></i> 2 Unapproved Users<br>
                    <i class="fas fa-user-shield"></i> 16 Admins<br>
                    <i class="fas fa-user-times"></i> 128 Never Logged In
                </p>
            </div>
        </div>

        <!-- Helpdesk Tracker -->
        <div class="col-md-4 col-lg-6">
            <div class="card p-4">
                <h5 class="dashboard-title">Helpdesk Tracker</h5>
                <div class="stat-row">
                    <div>
                        <p class="stat-label">Personal</p>
                        <p class="stat-number text-red">36</p>
                    </div>
                    <div>
                        <p class="stat-label">Community</p>
                        <p class="stat-number text-green">212</p>
                    </div>
                </div>
                <button class="btn btn-custom mt-auto">Lodge New Request</button>
            </div>
        </div>
    </div>

    <!-- Accounting Section -->
    <h2 class="accounting-header">Accounting</h2>
    <div class="row equal-height">
        <!-- Income Tracker -->
        <div class="col-md-4 col-lg-6">
            <div class="card p-4">
                <h5 class="dashboard-title">Income Tracker</h5>
                <input type="text" id="incomeDateRange" class="form-control mb-3" placeholder="Select Date Range">
                <div class="chart-container">
                    <canvas id="incomePieChart"></canvas>
                </div>
                <div class="text-center mt-3">
                    <h4 class="stat-number text-green">₹25,20,179.00</h4>
                    <p class="stat-label">Balance Amount</p>
                </div>
                <p class="section-content text-center">
                    Jan ₹5000 &nbsp; | &nbsp; Feb ₹3000 &nbsp; | &nbsp; Mar ₹4000 &nbsp; | &nbsp; Apr ₹2000 &nbsp; | &nbsp; May ₹3000 &nbsp; | &nbsp; Jun ₹2500 &nbsp; | &nbsp; Jul ₹4000 &nbsp; | &nbsp; Aug ₹3500 &nbsp; | &nbsp; Sep ₹4200 &nbsp; | &nbsp; Oct ₹3000 &nbsp; | &nbsp; Nov ₹3200 &nbsp; | &nbsp; Dec ₹3700
                </p>
            </div>
        </div>

        <!-- Expense Tracker -->
        <div class="col-md-4 col-lg-6">
            <div class="card p-4">
                <h5 class="dashboard-title">Expense Tracker</h5>
                <input type="text" id="expenseDateRange" class="form-control mb-3" placeholder="Select Date Range">
                <div class="chart-container">
                    <canvas id="expenseBarChart"></canvas>
                </div>
                <div class="text-center mt-3">
                    <h4 class="stat-number text-red">₹32,88,436.45</h4>
                    <p class="stat-label">Total Expenses</p>
                </div>
                <p class="section-content text-center">
                    Jan ₹6000 &nbsp; | &nbsp; Feb ₹5000 &nbsp; | &nbsp; Mar ₹5500 &nbsp; | &nbsp; Apr ₹4500 &nbsp; | &nbsp; May ₹6000 &nbsp; | &nbsp; Jun ₹5000 &nbsp; | &nbsp; Jul ₹5500 &nbsp; | &nbsp; Aug ₹5300 &nbsp; | &nbsp; Sep ₹6000 &nbsp; | &nbsp; Oct ₹5200 &nbsp; | &nbsp; Nov ₹5500 &nbsp; | &nbsp; Dec ₹5800
                </p>
            </div>
        </div>
    </div>
    
    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Flatpickr Library -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialize Flatpickr for date range picker
        flatpickr("#incomeDateRange", {
            mode: "range",
            dateFormat: "d-m-Y",
        });
        
        flatpickr("#expenseDateRange", {
            mode: "range",
            dateFormat: "d-m-Y",
        });
    
        // Income Pie Chart
        var ctx = document.getElementById('incomePieChart').getContext('2d');
        var incomePieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Collected', 'Balance'],
                datasets: [{
                    data: [50000, 75000], // Example data, replace with actual values
                    backgroundColor: ['#28a745', '#dc3545'],
                    borderWidth: 0
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    
        // Expense Bar Chart
        var ctx2 = document.getElementById('expenseBarChart').getContext('2d');
        var expenseBarChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Expenses',
                    data: [6000, 5000, 5500, 4500, 6000, 5000, 5500, 5300, 6000, 5200, 5500, 5800], // Example data, replace with actual values
                    backgroundColor: '#17a2b8',
                    borderWidth: 0
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
    
    <!-- Bootstrap JS and Dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection
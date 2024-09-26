<style>
    /* Responsive Container */
    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    /* Flexbox for Column Layouts */
    .col-md-9 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .nav-tabs {
        background-color: rgb(220, 226, 249);
    }

    .unit-bar {
        background-color: rgb(220, 226, 249);
        border-radius: 12px;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-top: 40px;
    }

    .unit-text, .unit-number, .dropdown-arrow {
        font-size: 1rem;
    }

    .card-container {
        display: flex;
        gap: 24px;
        margin-top: 40px;
        margin-left: auto;
        margin-right: auto;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card-item {
        background-color: #fff;
        border-radius: 12px;
        padding: 10px 20px;
        width: 100%;
        max-width: 250px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        height: 133%;
        margin-bottom: 20px;
    }

    .card-item img {
        width: 50px;
        height: 50px;
        margin-right: 15px;
    }

    .card-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .card-content h3 {
        margin: 0;
        font-size: 1.75rem;
        font-weight: bold;
    }

    .card-content p {
        margin: 0;
        color: gray;
        font-size: 1rem;
    }

    .card-item.members {
        border-bottom: 5px solid #28b485;
    }

    .card-item.vehicles {
        border-bottom: 5px solid #3498db;
    }

    .card-item.documents {
        border-bottom: 5px solid #e74c3c;
    }

    .nav-tabs .nav-link.active {
        background-color: black;
        color: white;
    }

    /* Media Queries for Responsiveness */
    @media only screen and (max-width: 768px) {
        .container {
            padding: 0 10px;
        }

        .card-container {
            flex-direction: column;
            gap: 20px;
            margin-top: 20px;
        }

        .unit-bar, .card-item, .nav-tabs, .tab-content {
            width: 100%;
            margin-left: 0;
            margin-right: 0;
        }

        .card-item {
            max-width: 100%;
            margin-bottom: 20px;
        }

        .unit-text, .unit-number, .dropdown-arrow {
            font-size: 0.9rem;
        }

        .card-content h3 {
            font-size: 1.5rem;
        }

        .card-content p {
            font-size: 0.9rem;
        }
    }

    @media only screen and (max-width: 480px) {
        .card-container {
            gap: 10px;
            margin-top: 10px;
        }

        .unit-bar, .card-item, .nav-tabs, .tab-content {
            width: 100%;
            padding: 10px;
        }

        .card-item img {
            width: 40px;
            height: 40px;
        }

        .card-content h3 {
            font-size: 1.25rem;
        }

        .card-content p {
            font-size: 0.8rem;
        }
    }
</style>

@extends('layouts.resident')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10">
            <!-- <div class="card">
                <div class="card-header" style="background-color:rgb(242, 244, 252)">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h2>You are a Resident User.</h2>
                    
                    <p class="mt-4">
                        <strong>Name:</strong> {{ Auth::user()->name }}
                    </p>
                    <p>
                        <strong>Email:</strong> {{ Auth::user()->email }}
                    </p>

                </div>
            </div>
        </div> -->

        <div class="col-md-10">
            <div class="unit-bar">
                <span class="unit-text">Unit No:</span>
                <span class="unit-number">D-0803</span>
                <span class="dropdown-arrow">&#9660;</span> <!-- Unicode for downward arrow -->
            </div>

            <div class="card-container">
                <div class="card-item members">
                    <img src="{{ asset('images/members.jpeg') }}" alt="Members Icon">
                    <div class="card-content">
                        <h3>4</h3>
                        <p>Members</p>
                    </div>
                </div>

                <div class="card-item vehicles">
                    <img src="{{ asset('images/cars.jpeg') }}" alt="Vehicles Icon">
                    <div class="card-content">
                        <h3>0</h3>
                        <p>Vehicles</p>
                    </div>
                </div>

                <div class="card-item documents">
                    <img src="{{ asset('images/document.png') }}" alt="Documents Icon">
                    <div class="card-content">
                        <h3>0</h3>
                        <p>Documents</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nav Tabs -->
        <div class="col-md-10">
            <div class="card mt-5">
                <div class="card-body">
        
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active tab-links" href="#" data-target="dues-content" >Dues</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tab-links" href="#" data-target="history-content">History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tab-links" href="#" data-target="online-payments-content">Online Payments</a>
                        </li>
                    </ul>


                    <!-- Tab Contents -->
                    <div id="dues-content" class="tab-content">
                    <div class="mt-3">
        <h4 class="mb-0">
            Amount Due: <span id="amount-due">₹{{ number_format($totalAmountDue, 2) }}</span> 
            | Accrued Penalty: <span id="accrued-penalty">₹0</span>
        </h4>
    </div>


                        <div class="row mt-4">
                            <div class="col-md-3">
                                <p><strong>Bill No:</strong> 4169 <span class="badge badge-danger">Overdue</span></p>
                            </div>
                            <div class="col-md-3">
                                <p><strong>Bill Date:</strong> 01-Jul-2024</p>
                            </div>
                            <div class="col-md-3">
                                <p><strong>Due Date:</strong> 15-Jul-2024</p>
                            </div>
                            <div class="col-md-3">
                                <p><strong>Amount:</strong> ₹15,477</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <!-- <button class="btn btn-primary btn-block">Pay Now</button> -->
                                <a href="{{ route('maintenance.paymentForm') }}" class="btn btn-primary">Pay Now</a>

                            </div>
                        </div>
                    </div>

                    <div id="history-content" class="tab-content" style="display: none;">
                        <!-- History Table -->
                        <div class="table-responsive mt-3">
                            <input type="text" class="form-control mb-3" placeholder="Search">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Bill No.</th>
                                        <th>Receipt No.</th>
                                        <th>Comment</th>
                                        <th>Due</th>
                                        <th>Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01-07-2024</td>
                                        <td>4169</td>
                                        <td></td>
                                        <td>Maintenance Fee</td>
                                        <td>₹15,477</td>
                                        <td>₹0</td>
                                    </tr>
                                    <tr>
                                        <td>03-05-2024</td>
                                        <td>3287</td>
                                        <td>3287</td>
                                        <td>by ADDA Online Payment Gateway: Order No #SKL000...</td>
                                        <td>₹0</td>
                                        <td>₹15,477</td>
                                    </tr>
                                    <!-- Additional rows as needed -->
                                </tbody>
                            </table>
                        </div>
                        <!-- Image container -->
                        <div id="history-image-container" style="margin-top: 20px; text-align: center;">
                            <!-- <img id="history-image" src="/mnt/data/image.png" alt="History Image" style="max-width: 100%; height: auto;"> -->
                        </div>
                    </div>

                    <div id="online-payments-content" class="tab-content" style="display: none;">
                        <!-- Image container for online payments -->
                        <input type="text" class="form-control mb-3 mt-3" placeholder="Search">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Date Initiated</th>
                                    <th>Order No.</th>
                                    <th>Amount.</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>13-02-2019 4:38 PM</td>
                                    <td>SKL001470232</td>
                                    <td>12663.00</td>
                                    <td>Confirmed</td>

                                </tr>
                                <tr>
                                    <td>15-03-2019 9:23 AM</td>
                                    <td>SKL001527233</td>
                                    <td>12663.00</td>
                                    <td>Confirmed</td>

                                </tr>
                                <tr>
                                    <td>16-03-2019 9:30 AM</td>
                                    <td>SKL001527234</td>
                                    <td>12664.00</td>
                                    <td>Confirmed</td>

                                </tr>
                                <tr>
                                    <td>16-03-2019 9:35 AM</td>
                                    <td>SKL001527235</td>
                                    <td>12665.00</td>
                                    <td>Confirmed</td>

                                </tr>
                                <!-- Additional rows as needed -->
                            </tbody>
                        </table>


                        <div id="online-payments-image-container" style="margin-top: 20px; text-align: center;">
                            <!-- <img id="online-payments-image" src="/mnt/data/image.png" alt="Online Payments Image" style="max-width: 100%; height: auto;"> -->
                        </div>


                    </div>
                </div>
            </div>
        </div>
       

    </div>
</div>

<!-- JavaScript to handle tab clicks and image display -->
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        const historyTab = document.querySelector('a[data-target="history-content"]');
        const historyImage = document.getElementById('history-image');
        const historyImageContainer = document.getElementById('history-image-container');

        const onlinePaymentsTab = document.querySelector('a[data-target="online-payments-content"]');
        const onlinePaymentsImage = document.getElementById('online-payments-image');
        const onlinePaymentsImageContainer = document.getElementById('online-payments-image-container');

        historyTab.addEventListener('click', function() {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(function(content) {
                content.style.display = 'none';
            });
            // Show the history content
            document.getElementById('history-content').style.display = 'block';
        });

        onlinePaymentsTab.addEventListener('click', function() {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(function(content) {
                content.style.display = 'none';
            });
            // Show the online payments content
            document.getElementById('online-payments-content').style.display = 'block';
        });
    });

    // document.querySelectorAll('.nav-link').forEach(item => {
    //         item.addEventListener('click', function(event) {
    //             event.preventDefault(); // Prevent the default link behavior

    //             // Remove active class from all nav-links
    //             document.querySelectorAll('.nav-link').forEach(link => {
    //                 link.classList.remove('active');
    //             });

    //             // Add active class to the clicked nav-link
    //             this.classList.add('active');
    //         });
    //     });

     document.querySelectorAll('.tab-links').forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior

                // Remove active class from all nav-links
                document.querySelectorAll('.tab-links').forEach(link => {
                    link.classList.remove('active');
                });

                // Add active class to the clicked nav-link
                this.classList.add('active');
            });
        });
</script> 
@endsection
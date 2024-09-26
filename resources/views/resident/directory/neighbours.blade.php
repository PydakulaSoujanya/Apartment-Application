@extends('layouts.resident')

@section('title', 'Directory')

@section('content')
<style>
        /* Tab styling */
        .nav-tabs {
            border-bottom: 1px solid #ddd;
        }

        .nav-link {
            color: black;
            font-weight: bold;
            padding: 10px 20px;
        }

        .nav-link.active {
            border-bottom: 3px solid yellow;
        }

        /* Card and badge styling */
        .card {
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            margin-bottom: 10px;
        }

        .badge {
            font-size: 12px;
            padding: 5px 10px;
        }

        /* Hide the sections by default */
        #managingCommitteeSection {
            display: none;
        }

        .search-bar {
            margin-bottom: 15px;
        }
    </style>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <!-- Tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#" id="residentTab">Resident</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="managingCommitteeTab">Managing Committee</a>
                </li>
            </ul>

            <!-- Resident Section -->
            <div id="residentSection" class="mt-3">
                <div class="input-group search-bar">
                    <input type="text" id="searchResident" class="form-control" placeholder="Search Neighbours">
                    <button class="btn btn-outline-secondary" type="button" id="sortResidentButton">
                        <i class="bi bi-arrow-down-up"></i> Sort
                    </button>
                </div>

                <!-- Resident Cards -->
                <div class="card card-item">
                    <div class="card-body">
                        <h6 class="card-title">Anup Apasangi</h6>
                        <p class="card-text"><small>A 0201 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <h6 class="card-title">Meenakshi Sharma</h6>
                        <p class="card-text"><small>A 0304 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <h6 class="card-title">Sharma</h6>
                        <p class="card-text"><small>A 0305 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <h6 class="card-title">Virat Sharma</h6>
                        <p class="card-text"><small>A 0306 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <h6 class="card-title">Paul</h6>
                        <p class="card-text"><small>A 0309 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <h6 class="card-title">Peter</h6>
                        <p class="card-text"><small>A 0307 | Owner</small></p>
                    </div>
                </div>
            </div>

            <!-- Managing Committee Section -->
            <div id="managingCommitteeSection" class="mt-3">
                <div class="search-bar">
                    <input type="text" id="searchCommittee" class="form-control" placeholder="Search Management Committee">
                </div>

                <!-- Committee Cards -->
                <div class="card card-item">
                    <div class="card-body">
                        <span class="badge bg-success">Treasurer</span>
                        <h6 class="card-title">Abhijith M K</h6>
                        <p class="card-text"><small>D 0402 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <span class="badge bg-primary">Member</span>
                        <h6 class="card-title">Jeevan</h6>
                        <p class="card-text"><small>D 0801 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <span class="badge bg-primary">Member</span>
                        <h6 class="card-title">Ponting</h6>
                        <p class="card-text"><small>D 0801 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <span class="badge bg-primary">Member</span>
                        <h6 class="card-title">Hendry</h6>
                        <p class="card-text"><small>D 0801 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <span class="badge bg-primary">Member</span>
                        <h6 class="card-title">Samsun</h6>
                        <p class="card-text"><small>D 0801 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <span class="badge bg-primary">Member</span>
                        <h6 class="card-title">Ricky</h6>
                        <p class="card-text"><small>D 0801 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <span class="badge bg-primary">Member</span>
                        <h6 class="card-title">Joy</h6>
                        <p class="card-text"><small>D 0801 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <span class="badge bg-primary">Member</span>
                        <h6 class="card-title">Shenoy</h6>
                        <p class="card-text"><small>D 0801 | Owner</small></p>
                    </div>
                </div>
                <div class="card card-item">
                    <div class="card-body">
                        <span class="badge bg-primary">Member</span>
                        <h6 class="card-title">Ajay</h6>
                        <p class="card-text"><small>D 0801 | Owner</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle between Resident and Managing Committee sections
    document.getElementById('residentTab').addEventListener('click', function () {
        document.getElementById('residentSection').style.display = 'block';
        document.getElementById('managingCommitteeSection').style.display = 'none';
        this.classList.add('active');
        document.getElementById('managingCommitteeTab').classList.remove('active');
    });

    document.getElementById('managingCommitteeTab').addEventListener('click', function () {
        document.getElementById('residentSection').style.display = 'none';
        document.getElementById('managingCommitteeSection').style.display = 'block';
        this.classList.add('active');
        document.getElementById('residentTab').classList.remove('active');
    });

    // Resident search functionality
    document.getElementById("searchResident").addEventListener("input", function () {
        let searchTerm = this.value.toLowerCase();
        let cards = document.querySelectorAll("#residentSection .card-item");

        cards.forEach(card => {
            let title = card.querySelector(".card-title").textContent.toLowerCase();
            if (title.includes(searchTerm)) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });
    });

    // Committee search functionality
    document.getElementById("searchCommittee").addEventListener("input", function () {
        let searchTerm = this.value.toLowerCase();
        let cards = document.querySelectorAll("#managingCommitteeSection .card-item");

        cards.forEach(card => {
            let title = card.querySelector(".card-title").textContent.toLowerCase();
            if (title.includes(searchTerm)) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });
    });
</script>
@endsection

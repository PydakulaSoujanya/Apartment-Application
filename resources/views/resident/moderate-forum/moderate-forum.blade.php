@extends('layouts.resident')

@section('title', 'Moderate Forum')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fff; /* White background */
        }
        .moderate-form-navbar {
            background-color: #fff; /* White navbar */
        }
        .moderate-form-nav-link {
            color: #555 !important;
        }
        .moderate-form-navbar-nav {
            margin-left: 200px; /* Pushes the nav items to the right */
        }
        .moderate-form-nav-item {
            margin-bottom: 10px; /* Gap between navigation items */
        }
        .moderate-form-nav-item.active .moderate-form-nav-link {
            color: #000 !important; /* Black text for active tab */
            font-weight: bold;
            border-bottom: 3px solid #fdd835; /* Yellow underline */
        }
        .moderate-form-container {
            padding-top: 50px;
        }
        .moderate-form-container h3 {
            margin-bottom: 20px; /* Gap between header and content */
        }
        .moderate-form-btn {
            background-color: #00bcd4; /* Blue button */
            color: #fff;
            margin-right: 10px;
            margin-top: 13px;
        }
        .moderate-form-btn:hover, .moderate-form-btn:focus {
            background-color: #007a8a;
        }
        .moderate-form-btn-log {
            background-color: #00bcd4; /* Blue buttons for log */
            color: #fff;
            margin: 10px 10px 0 0;
        }
        .moderate-form-content-box {
            padding: 20px;
            border: 1px solid #d1e3ed;
            background-color: #f9f9f9;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .moderate-form-group-readonly {
            margin-bottom: 15px;
        }
        .moderate-form-read-only-form {
            padding: 20px;
            border: 1px solid #d1e3ed;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        /* Tablet View (iPad) */
        @media (min-width: 768px) and (max-width: 1024px) {
            .moderate-form-navbar-nav {
                margin-left: 50px; /* Adjust the margin for tablet view */
            }

            .moderate-form-container {
                padding-top: 30px; /* Adjust padding for tablet view */
            }

            .moderate-form-content-box,
            .moderate-form-settings-form,
            .moderate-form-moderator-form,
            .moderate-form-read-only-form {
                padding: 15px; /* Adjust padding for tablet view */
            }

            .moderate-form-btn {
                margin-right: 5px; /* Adjust button margin for tablet view */
            }

            .moderate-form-nav-item {
                margin-bottom: 5px; /* Adjust gap between nav items for tablet view */
            }

            .moderate-form-nav-link {
                font-size: 16px; /* Adjust font size for nav links on tablet view */
            }
        }

        /* Mobile View */
        @media (max-width: 767px) {
            .moderate-form-navbar-nav {
                margin-left: 0; /* Remove margin for mobile view */
                text-align: center; /* Center align nav items for mobile view */
            }

            .moderate-form-nav-item {
                margin-bottom: 0; /* Remove bottom margin for mobile view */
            }

            .moderate-form-nav-link {
                font-size: 14px; /* Adjust font size for nav links on mobile view */
            }

            .moderate-form-container {
                padding-top: 20px; /* Adjust padding for mobile view */
            }

            .moderate-form-content-box,
            .moderate-form-settings-form,
            .moderate-form-moderator-form,
            .moderate-form-read-only-form {
                padding: 10px; /* Adjust padding for mobile view */
            }

            .moderate-form-btn {
                margin-right: 0; /* Remove button margin for mobile view */
                margin-top: 10px; /* Adjust margin top for mobile view */
                display: block; /* Make buttons block level for mobile view */
                width: 100%; /* Make buttons full width for mobile view */
            }

            .moderate-form-nav-link {
                display: block; /* Make nav links block level for mobile view */
                padding: 10px; /* Adjust padding for nav links on mobile view */
            }
        }
    </style>


    <!-- Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light moderate-form-navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav moderate-form-navbar-nav">
                <li class="nav-item moderate-form-nav-item active">
                    <a class="nav-link moderate-form-nav-link" href="#messages" onclick="loadPage('messages')">Messages</a>
                </li>
                <li class="nav-item moderate-form-nav-item">
                    <a class="nav-link moderate-form-nav-link" href="#polls" onclick="loadPage('polls')">Polls</a>
                </li>
                <li class="nav-item moderate-form-nav-item">
                    <a class="nav-link moderate-form-nav-link" href="#photos" onclick="loadPage('photos')">Photos</a>
                </li>
                <li class="nav-item moderate-form-nav-item">
                    <a class="nav-link moderate-form-nav-link" href="#settings" onclick="loadPage('settings')">Settings</a>
                </li>
                <li class="nav-item moderate-form-nav-item">
                    <a class="nav-link moderate-form-nav-link" href="#moderators" onclick="loadPage('moderators')">Moderators</a>
                </li>
                <li class="nav-item moderate-form-nav-item">
                    <a class="nav-link moderate-form-nav-link" href="#readonly" onclick="loadPage('readonly')">Read Only</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Dynamic Content Container -->
    <div class="container moderate-form-container" id="content-container">
        <!-- Content will be loaded here dynamically -->
    </div>

    <!-- JavaScript to handle page routing -->
    <script>
        function loadPage(page) {
            // Remove 'active' class from all nav-items
            let navItems = document.querySelectorAll('.moderate-form-nav-item');
            navItems.forEach(function(item) {
                item.classList.remove('active');
            });

            // Add 'active' class to clicked nav-item
            let currentNavItem = document.querySelector(a[href="#${page}"]).parentElement;
            currentNavItem.classList.add('active');

            // Load content based on the selected page
            let contentContainer = document.getElementById('content-container');
            switch (page) {
                case 'messages':
                    contentContainer.innerHTML = `
                        <h3>Messages Awaiting Approval</h3>
                        <div class="moderate-form-content-box">
                            <p>There are no posts awaiting confirmation.</p>
                        </div>
                        <button class="btn moderate-form-btn" onclick="toggleLog()">Show Log</button>
                        <button class="btn moderate-form-btn" onclick="toggleLog()">Hide Log</button>`;
                    break;
                case 'polls':
                    contentContainer.innerHTML = `
                        <h3>Polls Awaiting Approvals</h3>
                        <div class="moderate-form-content-box">
                            <p>There are no polls available at the moment.</p>
                        </div>
                        <button class="btn moderate-form-btn" onclick="toggleLog()">Show Log</button>
                        <button class="btn moderate-form-btn" onclick="toggleLog()">Hide Log</button>`;
                    break;
                case 'photos':
                    contentContainer.innerHTML = `
                        <h3>Photos Awaiting Approvals</h3>
                        <div class="moderate-form-content-box">
                            <p>No photos have been uploaded yet.</p>
                        </div>
                        <button class="btn moderate-form-btn" onclick="toggleLog()">Show Log</button>
                        <button class="btn moderate-form-btn" onclick="toggleLog()">Hide Log</button>`;
                    break;
                case 'settings':
                    contentContainer.innerHTML = `
                        <h3>Settings</h3>
                        <div class="moderate-form-content-box">
                            <div class="moderate-form-settings-form">
                                <div class="form-group">
                                    <label>Forum Moderation</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="forumModeration" value="enable"> Enable
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="forumModeration" value="disable" checked> Disable
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Allow post in Sub groups only</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="subGroups" value="enable"> Enable
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="subGroups" value="disable" checked> Disable
                                        </label>
                                    </div>
                                </div>
                                <button class="btn moderate-form-btn" onclick="saveSettings()">Save</button>
                                <button class="btn moderate-form-btn" onclick="resetSettings()">Reset</button>
                            </div>
                        </div>
                        <button class="btn moderate-form-btn-log" onclick="toggleLog()">Show Log</button>
                        <button class="btn moderate-form-btn-log" onclick="toggleLog()">Hide Log</button>`;
                    break;
                case 'moderators':
                    contentContainer.innerHTML = `
                        <h3>Add Forum Moderator</h3>
                        <div class="moderate-form-content-box">
                            <div class="moderate-form-moderator-form">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="forumModerationCheckbox">
                                        On checking this checkbox, the forum posts created by the below forum moderators will not come for moderation and will get posted directly.
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="selectUsers">Select Users</label>
                                    <select class="form-control" id="selectUsers">
                                        <option>Moderator 1</option>
                                        <option>Moderator 2</option>
                                        <option>Moderator 3</option>
                                    </select>
                                </div>
                                <button class="btn moderate-form-btn" onclick="saveModerator()">Save</button>
                                <button class="btn moderate-form-btn" onclick="addModerator()">Add</button>
                            </div>
                        </div>
                        <button class="btn moderate-form-btn-log" onclick="toggleLog()">Show Log</button>
                        <button class="btn moderate-form-btn-log" onclick="toggleLog()">Hide Log</button>`;
                    break;
                case 'readonly':
                    contentContainer.innerHTML = `
                        <h3>Read Only</h3>
                        <div class="moderate-form-read-only-form">
                            <div class="moderate-form-group-readonly">
                                <label for="readOnlyUserSelect">Select Users As Read Only</label>
                                <select class="form-control" id="readOnlyUserSelect">
                                    <option>User 1</option>
                                    <option>User 2</option>
                                    <option>User 3</option>
                                </select>
                            </div>
                            <div class="moderate-form-group-readonly text-right">
                                <button class="btn moderate-form-btn" onclick="saveReadOnly()">Save</button>
                            </div>
                        </div>
                        <button class="btn moderate-form-btn-log" onclick="toggleLog()">Show Log</button>
                        <button class="btn moderate-form-btn-log" onclick="toggleLog()">Hide Log</button>`;
                    break;
                default:
                    contentContainer.innerHTML = <h3>Page Not Found</h3>;
            }
        }

        function toggleLog() {
            alert('Log toggled!');
        }

        function saveSettings() {
            alert('Settings saved!');
        }

        function resetSettings() {
            alert('Settings reset!');
        }

        function saveModerator() {
            alert('Moderator saved!');
        }

        function addModerator() {
            alert('Moderator added!');
        }

        function saveReadOnly() {
            alert('Read Only settings saved!');
        }

        // Load default content
        loadPage('messages');
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@extends('layouts.admin')

@section('title', 'Projects&Meetings')

@section('content')
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create a Meeting</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .container {
      max-width: 1200px;
      margin: 0 auto;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-label {
      font-weight: bold;
    }
  </style>


  <div class="container my-5">
    <h1 class="text-center mb-4">Create a Meeting</h1>

    <div class="row">
      <!-- Left Section: col-md-8 -->
      <div class="col-md-8">
        <form id="meetingForm">
          <div class="row mb-3">
            <div class="col-md-6 form-group">
              <label for="date" class="form-label">Date</label>
              <input type="date" id="date" class="form-control" value="2024-09-14">
            </div>
            <div class="col-md-6 form-group">
  <label for="time" class="form-label">Time</label>
  <div class="d-flex">
    <!-- Hour Dropdown -->
    <select id="timeHour" class="form-select" style="width: auto; margin-right: 5px;">
    </select>
    
    <span>:</span>

    <!-- Minute Dropdown -->
    <select id="timeMinute" class="form-select" style="width: auto; margin-left: 5px;">
    </select>
  </div>
</div>

<script>
  // Function to populate hours dropdown
  function populateHours() {
    const hourSelect = document.getElementById('timeHour');
    for (let hour = 0; hour < 24; hour++) {
      let option = document.createElement('option');
      option.value = hour;
      option.text = hour < 10 ? '0' + hour : hour;
      hourSelect.appendChild(option);
    }
  }

  // Function to populate minutes dropdown
  function populateMinutes() {
    const minuteSelect = document.getElementById('timeMinute');
    for (let minute = 0; minute < 60; minute += 5) {  // Step of 5 minutes
      let option = document.createElement('option');
      option.value = minute;
      option.text = minute < 10 ? '0' + minute : minute;
      minuteSelect.appendChild(option);
    }
  }

  // Call the functions to populate hours and minutes
  populateHours();
  populateMinutes();
</script>

          </div>

          <div class="row mb-3">
            <div class="col-md-6 form-group">
              <label for="duration" class="form-label">Duration</label>
              <select id="duration" class="form-select">
                <option>1 Hour 30 min</option>
                <option>1 Hour</option>
                <option>45 min</option>
                <option>30 min</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="topic" class="form-label">Meeting Regards</label>
            <input type="text" id="topic" class="form-control" placeholder="Brief Topic">
          </div>

          <div class="form-group">
            <label for="venue" class="form-label">Venue</label>
            <input type="text" id="venue" class="form-control" placeholder="Venue">
          </div>

          <div class="form-group">
            <label for="notes" class="form-label">Notes</label>
            <textarea id="notes" class="form-control" rows="3" placeholder="Notes"></textarea>
          </div>

          <!-- Agenda Section -->
          <div id="agendaSection">
            <div class="form-group">
              <label for="agenda1" class="form-label">Agenda 1</label>
              <input type="text" id="agenda1" class="form-control" placeholder="Agenda 1">
            </div>
          </div>

          <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-primary" id="addAgendaBtn">Add More agenda</button>
            <button type="submit" class="btn btn-primary">Create Meeting</button>
          </div>
        </form>
      </div>

      <!-- Right Section: col-md-4 -->
      <div class="col-md-4">
        <div class="form-group">
          <label class="form-label">Attendees :</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="attendees" id="attendees1" checked>
            <label class="form-check-label" for="attendees1">
              Association Committee + Office Staff
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="attendees" id="attendees2">
            <label class="form-check-label" for="attendees2">
              Only Owners
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="attendees" id="attendees3">
            <label class="form-check-label" for="attendees3">
              All Users
            </label>
          </div>
        </div>

        <div class="form-group mt-4">
          <label class="form-label">Send Alert (Email + SMS) :</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="alert1" checked>
            <label class="form-check-label" for="alert1">
              Hour before Meeting
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="alert2">
            <label class="form-check-label" for="alert2">
              Day before Meeting
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="alert3">
            <label class="form-check-label" for="alert3">
              Week before Meeting
            </label>
          </div>
        </div>

        <div class="form-group mt-4">
          <label class="form-label">Attachments :</label>
          <p>Please save this Meeting, and then you can upload up to 3 Attachments.</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    let agendaCount = 1;
    const addAgendaBtn = document.getElementById('addAgendaBtn');
    const agendaSection = document.getElementById('agendaSection');

    addAgendaBtn.addEventListener('click', function() {
      agendaCount++;
      const agendaDiv = document.createElement('div');
      agendaDiv.classList.add('form-group');
      agendaDiv.innerHTML = `
        <label for="agenda${agendaCount}" class="form-label">Agenda ${agendaCount}</label>
        <input type="text" id="agenda${agendaCount}" class="form-control" placeholder="Agenda ${agendaCount}">
      `;
      agendaSection.appendChild(agendaDiv);
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
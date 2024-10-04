@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Create a Meeting</h2>
        <form action="{{ route('admin.meetings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" id="time" name="time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration</label>
                <select id="duration" name="duration" class="form-control" required>
                    <option>1 Hour</option>
                    <option>2 Hours</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div class="form-group">
                <label for="brief_topic">Brief Topic</label>
                <input type="text" id="brief_topic" name="brief_topic" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="venue">Venue</label>
                <input type="text" id="venue" name="venue" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="agenda">Agenda</label>
                <input type="text" name="agenda[]" class="form-control" placeholder="Agenda 1">
                <button type="button" onclick="addAgenda()">Add More agenda</button>
            </div>

            <div class="form-group">
                <label>Attendees:</label>
                <div>
                    <input type="radio" name="attendees" value="Association Committee + Office Staff" required> Association Committee + Office Staff
                </div>
                <div>
                    <input type="radio" name="attendees" value="Only Owners" required> Only Owners
                </div>
                <div>
                    <input type="radio" name="attendees" value="All Users" required> All Users
                </div>
            </div>

            <div class="form-group">
                <label>Send Alert (Email + SMS):</label>
                <div>
                    <input type="checkbox" name="alert[]" value="Hour before Meeting"> Hour before Meeting
                </div>
                <div>
                    <input type="checkbox" name="alert[]" value="Day before Meeting"> Day before Meeting
                </div>
                <div>
                    <input type="checkbox" name="alert[]" value="Week before Meeting"> Week before Meeting
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create Meeting</button>
        </form>
    </div>

    <script>
        function addAgenda() {
            const container = document.createElement('div');
            container.innerHTML = '<input type="text" name="agenda[]" class="form-control" placeholder="Agenda">';
            document.querySelector('form').insertBefore(container, document.querySelector('button[type="submit"]'));
        }
    </script>
@endsection

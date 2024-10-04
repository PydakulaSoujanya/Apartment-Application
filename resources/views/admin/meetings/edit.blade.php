@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Meeting</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.meetings.update', $meeting->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" value="{{ old('date', $meeting->date) }}" required>
        </div>

        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" class="form-control" name="time" value="{{ old('time', $meeting->time) }}" required>
        </div>

        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" class="form-control" name="duration" value="{{ old('duration', $meeting->duration) }}" required>
        </div>

        <div class="form-group">
            <label for="brief_topic">Brief Topic</label>
            <input type="text" class="form-control" name="brief_topic" value="{{ old('brief_topic', $meeting->brief_topic) }}" required>
        </div>

        <div class="form-group">
            <label for="venue">Venue</label>
            <input type="text" class="form-control" name="venue" value="{{ old('venue', $meeting->venue) }}" required>
        </div>

        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea class="form-control" name="notes">{{ old('notes', $meeting->notes) }}</textarea>
        </div>

        <!-- Dynamic Agenda Fields -->
        <div class="form-group">
            <label for="agenda">Agenda</label>
            <div id="agenda-list">
                @foreach(old('agenda', $meeting->agenda ?? []) as $index => $item)
                    <div class="input-group mb-2" id="agenda-item-{{ $index }}">
                        <input type="text" class="form-control" name="agenda[]" value="{{ $item }}" required>
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="button" onclick="removeAgenda({{ $index }})">Remove</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-primary mt-2" onclick="addAgenda()">Add Agenda Item</button>
        </div>

        <div class="form-group">
            <label>Attendees</label>
            <select class="form-control" name="attendees" required>
                <option value="Association Committee + Office Staff" {{ $meeting->attendees == 'Association Committee + Office Staff' ? 'selected' : '' }}>Association Committee + Office Staff</option>
                <option value="Only Owners" {{ $meeting->attendees == 'Only Owners' ? 'selected' : '' }}>Only Owners</option>
                <option value="All Users" {{ $meeting->attendees == 'All Users' ? 'selected' : '' }}>All Users</option>
            </select>
        </div>

        <div class="form-group">
            <label>Send Alert (Email + SMS)</label><br>
            <input type="checkbox" name="alert[]" value="Hour before Meeting" {{ in_array('Hour before Meeting', $meeting->alert) ? 'checked' : '' }}> Hour before Meeting<br>
            <input type="checkbox" name="alert[]" value="Day before Meeting" {{ in_array('Day before Meeting', $meeting->alert) ? 'checked' : '' }}> Day before Meeting<br>
            <input type="checkbox" name="alert[]" value="Week before Meeting" {{ in_array('Week before Meeting', $meeting->alert) ? 'checked' : '' }}> Week before Meeting<br>
        </div>

        <button type="submit" class="btn btn-success">Update Meeting</button>
        <a href="{{ route('admin.meetings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    let agendaCount = {{ count(old('agenda', $meeting->agenda ?? [])) }};

    function addAgenda() {
        const agendaList = document.getElementById('agenda-list');
        const newItem = document.createElement('div');
        newItem.classList.add('input-group', 'mb-2');
        newItem.setAttribute('id', `agenda-item-${agendaCount}`);
        newItem.innerHTML = `
            <input type="text" class="form-control" name="agenda[]" required>
            <div class="input-group-append">
                <button class="btn btn-danger" type="button" onclick="removeAgenda(${agendaCount})">Remove</button>
            </div>
        `;
        agendaList.appendChild(newItem);
        agendaCount++;
    }

    function removeAgenda(index) {
        const item = document.getElementById(`agenda-item-${index}`);
        item.remove();
    }
</script>

@endsection

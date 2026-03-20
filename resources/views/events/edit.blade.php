<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Event Bewerken - EventHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow border-warning">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0 text-center">Evenement Bewerken</h4>
            </div>
            <div class="card-body">

                <form action="{{ route('events.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- CRUCIAAL VOOR UPDATES --}}

                    <div class="mb-3">
                        <label class="form-label">Titel</label>
                        <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Omschrijving</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $event->description }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Locatie</label>
                            <input type="text" name="location" class="form-control" value="{{ $event->location }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Maximale Deelnemers</label>
                            <input type="number" name="max_attendees" class="form-control" value="{{ $event->max_attendees }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Datum en Tijd</label>
                        {{-- Format voor de HTML datetime-local input --}}
                        <input type="datetime-local" name="event_date" class="form-control" value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d\TH:i') }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('events.index') }}" class="btn btn-secondary">Annuleren</a>
                        <button type="submit" class="btn btn-warning px-4">Wijzigingen Opslaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

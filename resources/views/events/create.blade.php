<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuw Evenement - EventHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0 text-center">Nieuw Evenement Aanmaken</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('events.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Titel</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Bijv. Hackathon 2024" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Omschrijving</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Locatie</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="Bijv. Amsterdam" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Maximale Deelnemers</label>
                            <input type="number" name="max_attendees" class="form-control" value="{{ old('max_attendees') }}" placeholder="Bijv. 50" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Datum en Tijd</label>
                        <input type="datetime-local" name="event_date" class="form-control" value="{{ old('event_date') }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('events.index') }}" class="btn btn-secondary text-white">Annuleren</a>
                        <button type="submit" class="btn btn-success px-4 text-white">Opslaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

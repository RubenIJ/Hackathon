<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>EventHub - Overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>📅 EventHub</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary">+ Nieuw Evenement</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    @forelse($events as $event)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="text-muted mb-1 small">📍 {{ $event->location }}</p>
                    <p class="text-muted small">📅 {{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y H:i') }}</p>

                    <p class="card-text">{{ Str::limit($event->description, 100) }}</p>

                    {{-- Bonus: Status Badge --}}
                    @php $date = \Carbon\Carbon::parse($event->event_date); @endphp
                    @if($date->isToday())
                        <span class="badge bg-warning text-dark">Vandaag</span>
                    @elseif($date->isPast())
                        <span class="badge bg-secondary">Afgelopen</span>
                    @else
                        <span class="badge bg-success">Aankomend</span>
                    @endif

                    {{-- Bonus: Teller --}}
                    <div class="mt-2 small text-primary">
                        Capaciteit: {{ $event->max_attendees }} plekken
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm btn-outline-info">Details</a>
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-outline-warning">Bewerken</a>

                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Zeker weten?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Wis</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="lead mt-5 text-muted">Nog geen evenementen gevonden. Maak er snel een aan!</p>
        </div>
    @endforelse
</div>

</body>
</html>

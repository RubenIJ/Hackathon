<h1>Evenementen Overzicht</h1>

<a href="{{ route('events.create') }}">Nieuw Evenement Aanmaken</a>

<hr>

@foreach($events as $event)
    <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
        <h2>{{ $event->title }}</h2>
        <p>{{ $event->location }} - {{ $event->event_date }}</p>

        {{-- Jouw badge code werkt nu WEL omdat we binnen de foreach zitten --}}
        @php
            $date = \Carbon\Carbon::parse($event->event_date);
        @endphp

        @if($date->isToday())
            <span style="background: orange; padding: 5px;">Vandaag!</span>
        @elseif($date->isPast())
            <span style="background: gray; padding: 5px;">Afgelopen</span>
        @else
            <span style="background: green; color: white; padding: 5px;">Aankomend</span>
        @endif

        <br><br>
        <a href="{{ route('events.show', $event->id) }}">Bekijken</a>
    </div>
@endforeach

@if($events->isEmpty())
    <p>Er zijn nog geen evenementen. <a href="{{ route('events.create') }}">Maak er een aan!</a></p>
@endif

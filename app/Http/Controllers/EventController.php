<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal alle events op, gesorteerd op datum (zoals gevraagd in de opdracht!)
        $events = Event::orderBy('event_date', 'asc')->get();

        // Stuur ze naar de view (we gebruiken 'events.index' in plaats van 'welcome')
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'location' => 'required',
            'event_date' => 'required|date',
            'max_attendees' => 'required|integer|min:1',
        ]);

        Event::create($validated);
        return redirect()->route('events.index')->with('success', 'Event aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        // Laat het formulier zien met de huidige gegevens van het event
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // 1. Validatie (dezelfde als bij store)
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'location' => 'required',
            'event_date' => 'required|date',
            'max_attendees' => 'required|integer|min:1',
        ]);

        // 2. Update de gegevens in de database
        $event->update($validated);

        // 3. Terug naar het overzicht met succesmelding
        return redirect()->route('events.index')->with('success', 'Event succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event verwijderd.');
    }
}

<?php

use App\Http\Controllers\EventController;

// Dit zorgt dat de hoofdpagina direct naar je EventController gaat
Route::get('/', [EventController::class, 'index']);

// En dit maakt alle andere routes (create, store, edit, etc.) in één keer aan
Route::resource('events', EventController::class);

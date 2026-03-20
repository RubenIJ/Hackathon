<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Optioneel voor bonus

class Event extends Model
{
    // Dit heft de beveiliging op zodat Event::create() werkt
    protected $guarded = [];
}

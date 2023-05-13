<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable=[
        "event_name",
        "description",
        "number_of_tickets",
        "sport_id",
        "location_id",
        "team_id",
        "schedule_id",
    ];
}

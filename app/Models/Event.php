<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Team;

class Event extends Model
{
    use HasFactory;

    protected $fillable=[
        "event_name",
        "description",
        "number_of_tickets",
        "sport_id",
        "location_id",
        "schedule_id",
    ];

    // Use this to add data to database as JSON format 
    // protected function teams():Attribute{
    //     return Attribute::make(
    //         get: fn ($value)=>json_decode($value, true),
    //         set: fn ($value)=>json_encode($value),
    //     );
    // }

    public function teams():BelongsToMany{
        return $this->belongsToMany(Team::class, "event_details");
    }

    public function sport():BelongsTo{
        return $this->belongsTo(Sport::class);
    }

    public function schedule():BelongsTo{
        return $this->belongsTo(Schedule::class);
    }

    public function location():BelongsTo{
        return $this->belongsTo(Location::class);
    }

    public function booking():HasMany{
        return $this->hasMany(Booking::class);
    }
}

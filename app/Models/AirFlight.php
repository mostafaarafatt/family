<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirFlight extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_email',
        'joureny_type',
        'origin_airport',
        'destination_airport',
        'departure_data',
        'returend_data',
        'adults',
        'childes',
        'infants',
        'travel_class',
        'price',
        'currency',
        'uniqueId',
        'totalStops',
        'flightNumber',
        'journeyDuration',
        'marketingAirlineName'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPassengerNumberAttribute()
    {
        return $this->adults + $this->childes + $this->infants;
    }
}

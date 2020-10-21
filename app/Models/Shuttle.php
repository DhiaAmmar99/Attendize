<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shuttle extends Model
{
    protected $table = 'shuttles';

    protected $fillable = [
        'title',
        'description',
        'places_available',
        'arrival_time',
        'departure_time',
        'station_departure_id',
        'station_destination_id'

    ];

    /**
     * The users that belong to the shuttle.
     *
     * @return belongsTo
     */
    public function users()
    {
        return $this->belongsToMany(Rgistration::class);
    }
}

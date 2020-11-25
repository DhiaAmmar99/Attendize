<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservedShuttle extends Model
{
    protected $table = 'registration_shuttle';

    protected $fillable = [
        'registration_id',
        'shuttle_id',
        'nb_places'      

    ];
}

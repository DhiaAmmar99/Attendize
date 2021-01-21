<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationSchedule extends Model
{
    protected $table = 'registration_schedule';

    protected $fillable = [
        'registration_id',
        'session_id',
        'status'     

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationProgram extends Model
{
    protected $table = 'registration_program';

    protected $fillable = [
        'registration_id',
        'shuttle_id'      

    ];
}

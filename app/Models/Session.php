<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    
    protected $fillable = [
        'title' ,
        'description' ,
        'start_date' ,
        'end_date' ,
        'language' ,
        'room' ,
        'nb_session' ,
        'id_stream' ,
        'id_TOS' ,
        'id_program' 
    ];
}

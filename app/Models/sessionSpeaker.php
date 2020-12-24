<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sessionSpeaker extends Model
{
    protected $table = 'session_speaker';
    
    protected $fillable = [
        'session_id',
        'speaker_id'    

    ];
}

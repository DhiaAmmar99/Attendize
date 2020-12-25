<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sessionChair extends Model
{
    protected $table = 'session_chair';
    
    protected $fillable = [
        'session_id',
        'chair_id'    

    ];
}

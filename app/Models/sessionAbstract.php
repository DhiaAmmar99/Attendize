<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sessionAbstract extends Model
{
    protected $table = 'session_abstract';
    
    protected $fillable = [
        'session_id',
        'abstract_id'    

    ];
}

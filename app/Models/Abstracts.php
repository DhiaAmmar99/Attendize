<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abstracts extends Model
{
    protected $table = 'Abstracts';
        
    protected $fillable =[
            
            'title',
            'id_speaker',
            'description'
    ];
}

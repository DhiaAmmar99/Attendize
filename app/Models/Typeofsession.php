<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typeofsession extends Model
{
    protected $table = 'typeofsession';
        
    protected $fillable =[
        'title', 
        'icon',
        'description'
    ];
}

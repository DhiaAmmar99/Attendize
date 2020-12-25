<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
     
    protected $table = 'chairs';
        
    protected $fillable =[
        'firstname', 
        'lastname',
        'email',
        'country',
        'organization',
        'image',
        'description'
       
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    
    protected $table = 'speakers';
        
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
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    
    protected $table = 'speakers';
        
    protected $fillable =[
        'firstName', 
        'lastName',
        'email',
        'phone',
        'description',
        'id_event'
       
            
    ];
}
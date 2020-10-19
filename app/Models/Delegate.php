<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'delegates';
        
    protected $fillable =[
            
            'first_name',
            'last_name',
            'job_title',
            'organization',
            'email_address',
            'experience',
            'dietary',
            'language_translation',
            'languages',
            'first_check',
            'second_check',
            'guests',
            'lead',
            'register_id'
    ];
}

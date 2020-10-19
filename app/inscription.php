<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inscription extends Model
{
    protected $table = 'inscriptions';
        
    protected $fillable =[
            'registration_as', 
            'membership_number',
            'membership',
            'first_name',
            'last_name',
            'job_title',
            'organization',
            'email_address',
            'country',
            'city',
            'postal_address',
            'experience',
            'dietary',
            'language_translation',
            'languages',
            'first_check',
            'mode_payment',
            'second_check',
            'eventP',
            'eventS',
            'eventG',
            'eventW',
            'guests'
        ];
}

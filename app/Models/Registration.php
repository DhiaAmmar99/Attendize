<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
        protected $connection = 'mysql2';
        protected $table = 'registrations';
        
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
                'postal_address',
                'experience',
                'dietary',
                'language_translation',
                'languages',
                'first_check',
                'list_congress',
                'mode_payment',
                'payment_status',
                'second_check',
                'eventP',
                'eventS',
                'eventG',
                'eventW',
                'guests',
                'price',
                'lead'
        ];

}

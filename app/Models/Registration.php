<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
        protected $table = 'registrations';

        protected $fillable = [
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
                'mode_payment',
                'payment_status',
                'second_check',
                'eventP',
                'eventS',
                'eventG',
                'eventW',
                'guests',
                'price',
                'lead',
                'password'
        ];

        /**
         * The shuttles that belong to the user.
         *
         * @return belongsTo
         */
        public function shuttles()
        {
                return $this->belongsToMany(Shuttle::class);
        }
        /**
         * The programs that belong to the user.
         *
         * @return belongsTo
         */
        public function programs()
        {
                return $this->belongsToMany(program::class);
        }
}

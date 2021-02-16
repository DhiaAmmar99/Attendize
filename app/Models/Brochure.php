<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brochure extends Model
{
    protected $table = 'brochure';

    protected $fillable = [
        'first_name',
        'last_name',
        'job_title',
        'company',
        'email',
        'tel'
    ];

}

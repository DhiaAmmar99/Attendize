<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mailapi extends Model
{
	protected $connection = 'mysql2';
    protected $table = 'mailapi';
        
        protected $fillable =['email_address',];
}

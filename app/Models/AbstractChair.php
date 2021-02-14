<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbstractChair extends Model
{
    protected $table = 'abstracts_chair';
    
    protected $fillable = [
        'abstract_id',
        'chair_id'    

    ];
}

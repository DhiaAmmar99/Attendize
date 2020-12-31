<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
        
    protected $fillable =[
        'day', 
        'date'
    ];

    /**
     * The users that belong to the program.
     *
     * @return belongsTo
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\Registration')
            ->withTimestamps();
    }
}

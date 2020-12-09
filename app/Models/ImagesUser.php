<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagesUser extends Model
{
    protected $table = 'img_registration';
    protected $fillable = [
        'image',
        'id_registration'
    ];


    /**
    * Get the user that owns the image.
    */
    public function user()
    {
        return $this->belongsTo(Registration::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{

    protected $fillable = [
        'text',
        'image_path',
        'day',
    ];

   public function user()
    {
        return $this->belongsTo('App\User');
    }
}

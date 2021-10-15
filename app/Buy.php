<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{

     protected $fillable = [
        'image_file_name', 'image_title','day','user_id'
    ];

   public function user()
    {
        return $this->belongsTo('App\User');
    }
}

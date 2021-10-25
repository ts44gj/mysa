<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buy extends Model
{

     protected $fillable = [
        'image_file_name', 'image_title','day','user_id'
    ];

      public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}

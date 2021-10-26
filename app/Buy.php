<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buy extends Model
{

     protected $fillable = [
        'image_file_name', 'image_title','day','user_id'
    ];

      public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}

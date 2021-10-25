<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Morning extends Model
{
    protected $fillable = [
        'time','day','user_id'
    ];

       public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

}

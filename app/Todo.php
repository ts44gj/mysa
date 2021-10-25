<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
 protected $fillable = [
        'todo',
        'deadline',
    ];

       public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}

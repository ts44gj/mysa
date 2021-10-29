<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Memo extends Model
{

    protected $fillable = [
        'title', 'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

}

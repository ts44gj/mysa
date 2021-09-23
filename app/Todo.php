<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
 protected $fillable = [
        'todo',
        'deadline',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

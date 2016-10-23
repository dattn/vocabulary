<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'from', 'to'
    ];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}

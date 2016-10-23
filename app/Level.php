<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'label'
    ];

    public function groups()
    {
        return $this->hasMany('App\Group');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

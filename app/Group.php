<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'label'
    ];

    public function translations()
    {
        return $this->hasMany('App\Translation');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }
}

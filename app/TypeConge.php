<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeconge extends Model
{
    protected $guarded = [];
    public function conges()
    {
        return $this->hasMany('App\Conge');
    }
}

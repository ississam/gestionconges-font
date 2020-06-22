<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeConge extends Model
{
    public function conges()
    {
        return $this->hasMany('App\Conges');
    }
}

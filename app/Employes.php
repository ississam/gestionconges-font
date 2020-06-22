<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    public function services()
    {
        return $this->belongsTo('App\Services');
    }
    public function conges()
    {
        return $this->hasMany('App\Conges');
    }
}

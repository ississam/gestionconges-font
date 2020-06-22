<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conges extends Model
{
    public function employes()
    {
        return $this->belongsTo('App\Employes');
    }
    public function typeconge()
    {
        return $this->belongsTo('App\TypeConge');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public function employes()
    {
        return $this->hasMany('App\Employes');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // protected $fillable = ['id_service', 'service'];
    protected $guarded =[];
    public function employes()
    {
        return $this->hasMany('App\Employe');
    }
}

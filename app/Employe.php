<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    // protected $fillable = ['id_service','nom','prenom','adresse','tel','email','photo','date_naissance','daterecrutement'];
    protected $guarded = [];
    // protected $fillable = [
    //        'daterecrutement',
    // ];
    public function service()
    {
        // return $this->belongsTo('App\Service','service_id','service');
        return $this->belongsTo('App\Service');
    }

    public function conges()
    {
        return $this->hasMany('App\Conge');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }

}

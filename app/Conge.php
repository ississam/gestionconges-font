<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    protected $fillable = ['typeconge_id','employe_id','date_demande','date_depart','date_retour','val'];
    public function employe()
    {
        return $this->belongsTo('App\Employe');
        }
    public function typeconge()
    {
        return $this->belongsTo('App\Typeconge');
    }
}

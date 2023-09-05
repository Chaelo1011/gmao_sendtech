<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $table = 'maquinaria';

    public function taller ()
    {
        return $this->belongsTo('App\Taller');
    }

    public function plan_mantenimiento ()
    {
        return $this->hasMany('App\Plan_Mantenimiento');
    }
}

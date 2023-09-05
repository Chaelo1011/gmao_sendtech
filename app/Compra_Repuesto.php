<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra_Repuesto extends Model
{
    protected $table = 'compra_repuestos';

    public function plan_mantenimiento ()
    {
        return $this->belongsTo('App\Plan_Mantenimiento');
    }

    public function compra_repuestos_nm ()
    {
        return $this->hasMany('App\Compra_Repuestos_NM');
    }
}

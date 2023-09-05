<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repuesto_Plan_NM extends Model
{
    protected $table = 'repuestos_plan_nm';

    public function repuesto ()
    {
        return $this->belongsTo('App\Repuesto');
    }

    public function plan_mantenimiento ()
    {
        return $this->belongsTo('App\Plan_Mantenimiento');
    }
}

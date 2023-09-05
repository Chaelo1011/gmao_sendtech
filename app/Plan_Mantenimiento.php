<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_Mantenimiento extends Model
{
    protected $table = 'plan_mantenimiento';

    public function maquinaria ()
    {
        return $this->belongsTo('App\Maquinaria');
    }

    public function herramienta_plan ()
    {
        return $this->hasMany('App\Herramienta_Plan');
    }

    public function personal_plan ()
    {
        return $this->hasMany('App\Personal_Plan');
    }

    public function compra_repuestos ()
    {
        return $this->hasMany('App\Compra_Repuesto');
    }

    public function repuestos_plan ()
    {
        return $this->hasMany('App\Repuesto_Plan_NM');
    }
}

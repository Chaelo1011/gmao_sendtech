<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $table = 'repuestos';

    public function compra_repuestos_nm ()
    {
        return $this->hasMany('App\Compra_Repuestos_NM');
    }

    public function repuestos_plan ()
    {
        return $this->hasMany('App\Repuesto_Plan_NM');
    }
}

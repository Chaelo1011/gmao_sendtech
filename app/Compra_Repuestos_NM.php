<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra_Repuestos_NM extends Model
{
    protected $table = 'compra_repuestos_nm';

    public function repuesto ()
    {
        return $this->belongsTo('App\Repuesto');
    }

    public function compra_repuesto ()
    {
        return $this->belongsTo('App\Compra_Repuesto');
    }
}

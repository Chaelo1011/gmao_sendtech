<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta_Plan extends Model
{
    protected $table = 'herramienta_plan';

    public function herramienta ()
    {
        return $this->belongsTo('App\Herramienta');
    }

    public function plan_mantenimiento ()
    {
        return $this->belongsTo('App\Plan_Mantenimiento');
    }
}

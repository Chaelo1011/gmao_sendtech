<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    protected $table = 'herramientas';

    public function herramienta_plan ()
    {
        return $this->hasMany('App\Herramienta_Plan');
    }
}

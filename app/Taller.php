<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table = 'taller';

    public function maquinaria ()
    {
        return $this->hasMany('App\Maquinaria');
    }
}

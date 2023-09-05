<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal_Plan extends Model
{
    protected $table = 'personal_plan';

    public function personal ()
    {
        return $this->belongsTo('App\Personal');
    }

    public function plan_mantenimiento ()
    {
        return $this->belongsTo('App\Plan_Mantenimiento');
    }
}

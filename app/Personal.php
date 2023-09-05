<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    public function personal_plan ()
    {
        return $this->hasMany('App\Personal_Plan');
    }
}

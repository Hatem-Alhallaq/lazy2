<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table="countries";

    public function product()
    {
        return $this->hasMany('App\models\City');
    }
}

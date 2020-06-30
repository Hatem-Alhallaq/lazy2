<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable =
        [
            'name',
            'country_id',
            'latlang',
            'active'
        ];

    public  function country()
    {
        return $this->belongsTo('App\models\Country');
    }
}

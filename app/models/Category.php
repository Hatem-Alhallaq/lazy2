<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',
        'show'
    ];
    public function news()
    {
        return $this->hasMany('App\models\News');
    }
}

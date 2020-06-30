<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = [
        'title',
        'category_id',
        'summary',
        'published',
        'image',
        'details'
    ];
    public function category()
    {
        return $this->belongsTo('App\models\Category');
    }
}

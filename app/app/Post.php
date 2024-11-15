<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'date',
        'image',
        'introduction',
        'price',
        'condition',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function buy(){
        return $this->belongsTo('App\Buy');
    }
}


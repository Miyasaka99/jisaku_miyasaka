<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Post extends Model
{
    use SoftDeletes;
    
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


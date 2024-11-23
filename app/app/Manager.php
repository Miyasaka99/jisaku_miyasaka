<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function user(){
        return $this->hasMany('App\User');
    }
    public function post() {
        return $this->hasMany('App\Post');
    }

}

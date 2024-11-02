<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'id',
        'user_id',
        'date',
        'image',
        'introduction',
        'price',
        'condition',
        'buy_flg',
        'created_at',
        'updated_at',
    ];
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable= ['title','slung','content','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}

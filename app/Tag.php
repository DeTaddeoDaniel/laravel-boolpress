<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable= ['name','slung'];

    public function Posts()
    {
        return $this->belongsToMany('App\Post');
    }
}

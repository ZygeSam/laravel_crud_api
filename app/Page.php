<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function posts(){
        $this->hasMany('App\Post');
    }
}

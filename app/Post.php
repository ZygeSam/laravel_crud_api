<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function page(){
        $this->belongsTo('App\Page');
    }
}

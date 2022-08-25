<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravelista\Comments\Commentable;

class Post extends Model
{
   // use Commentable;
  

    public function category(){
        return $this->belongsTo('App\Models\Models\Category');
    }

}

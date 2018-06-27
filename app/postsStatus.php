<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postsStatus extends Model
{
    public function user(){
    	return $this->belongsToMany('\App\Post');
    }
}

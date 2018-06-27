<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postsCategory extends Model
{
    public function user(){
    	return $this->belongsToMany('\App\Post');
    }
}

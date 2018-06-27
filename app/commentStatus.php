<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentStatus extends Model
{
    public function user(){
    	return $this->belongsToMany('\App\Comment');
    }
}

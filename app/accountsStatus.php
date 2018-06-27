<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accountsStatus extends Model
{
    public function user(){
    	return $this->belongsToMany('\App\User');
    }
}

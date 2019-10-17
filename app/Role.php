<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
    	return $this->belongsToMany('App\User');
    }

    public function film()
    {
    	return $this->belongsToMany('App\Film');
    }

    public function specialization()
    {
    	return $this->belongsToMany('App\Specialization');
    }
}

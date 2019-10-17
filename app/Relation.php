<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
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

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function specializations()
    {
    	return $this->belongsToMany(Specialization::class);
    }

    public function films()
    {
    	return $this->belongsToMany(Film::class);
    }
}

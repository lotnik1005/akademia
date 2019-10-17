<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = [
        'name',
    ];

    public function users()
    {
    	return $this->hasMany('App\Film');
    }

    public function films()
    {
    	return $this->hasManyThrough('App\Specialization', 'App\User');
    }
}

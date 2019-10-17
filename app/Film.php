<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
    	'title',
    	'embed',
    	'description',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function specializations()
    {
        return $this->hasOne('App\Specialization');
    }
}

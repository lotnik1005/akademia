<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class City extends Model
{
    protected $fillable = [
        'name',
    ];

    /*public function user()
    {
        return $this->hasMany('App\User');
    }*/
}

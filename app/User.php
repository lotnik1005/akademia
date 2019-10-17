<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'role_id', 'city_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function friendsOfOther()
    {
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id')
            ->wherePivot('accepted', 1);
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id')
            ->wherePivot('accepted', 1);
    }

    public function friends()
    {
        return $this->friendsOfOther->merge($this->friendsOfMine);
    }

    public function posts()
    {
        return $this->hasMany('App\Post')->orderBy('created_at', 'desc');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function tutorsVisits()
    {
        return $this->hasMany(App\Visit, 'tutor_id');
    }

    public function studentsVisits()
    {
        return $this->hasMany(App\Visit, 'student_id');
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'specialization_users');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /*public function relations()
    {
        return $this->hasMany(Relation::class);
    }*/

    public function films()
    {
        return $this->hasMany('App\Film');
    }

    public function special()
    {
        return $this->hasManyThrough('App\Specialization', 'App\User');
    }

}

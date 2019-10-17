<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'tutor_id', 'student_id', 'date',
    ];

    public function tutor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}

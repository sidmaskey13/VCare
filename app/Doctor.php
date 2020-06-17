<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function work()
    {
        return $this->hasMany(Doctor::class);
    }
    public function field()
    {
        return $this->belongsTo(Field::class,'field_id');
    }
    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

    public function emergency()
    {
        return $this->hasMany(Emergency::class);
    }
}

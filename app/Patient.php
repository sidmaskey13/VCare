<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }
    public function emergency()
    {
        return $this->hasMany(Emergency::class);
    }
}

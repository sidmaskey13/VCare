<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function image()
    {
        return $this->hasMany(Report::class);
    }
}

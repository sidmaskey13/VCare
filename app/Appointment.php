<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function approved()
    {
        return $this->belongsTo(Approved::class);
    }

}

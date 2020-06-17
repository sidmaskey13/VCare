<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function doctor()
    {
        return $this->belongsTo(Work::class,'doctor_id');
    }
}

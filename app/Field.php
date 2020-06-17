<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}

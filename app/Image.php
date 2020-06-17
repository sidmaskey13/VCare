<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

}

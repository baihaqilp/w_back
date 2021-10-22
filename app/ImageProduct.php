<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    //
    public function produks()
    {
        return $this->belongsTo('Produks');
    }
}

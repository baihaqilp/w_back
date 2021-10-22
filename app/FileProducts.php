<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileProducts extends Model
{
    //
    protected $table = 'file_products';

    public function produks()
    {
        return $this->belongsTo('Produks');
    }
    
}

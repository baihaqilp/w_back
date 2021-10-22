<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{



    protected $fillable = [
        'user_id', 'penerima','provinsi','kota','kecamatan','desa','alamat_lengkap','rt_rw','kode_pos','lat','lng','is_main_address'
    ];

    //
    public function user()
    {
        return $this->belongsTo('User');
    }
}

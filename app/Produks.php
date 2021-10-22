<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    //

    protected $fillable = [
        'id_kategori', 'judul_produk', 'harga','deskripsi'
    ];


    public function image($fileName){
        $path = public_path().'/img/kategori/'.$fileName;
        return response()->download($path);        
    }

    public function fileProduct(){
        return $this->hasMany(FileProducts::class);
    }
}

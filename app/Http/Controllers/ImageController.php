<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produks;

class ImageController extends Controller
{
    //
    public function imageProduk($fileName){
        $path = public_path().'/img/produk/'.$fileName;
        return response()->download($path);        
    }

    public function imageKategori($fileName){
        $path = public_path().'/img/kategori/'.$fileName;
        return response()->download($path);        
    }
    public function imageBerita($fileName){
        $path = public_path().'/img/berita/'.$fileName;
        return response()->download($path);        
    }
    public function imageProfil($fileName){
        $path = public_path().'/img/foto/'.$fileName;
        return response()->download($path);        
    }

    public function imageBanner($fileName){
        $path = public_path().'/img/banner/'.$fileName;
        return response()->download($path);        
    }
}

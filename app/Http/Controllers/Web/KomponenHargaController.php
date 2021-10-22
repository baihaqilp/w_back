<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produks;
class KomponenHargaController extends Controller
{
    public function index(){
        $harga = Produks::all();
        return view('eccomerce/komponenharga',['harga'=>$harga]);
    }
}

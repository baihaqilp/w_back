<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produks;
class KomponenHargaController extends Controller
{
    public function index(){
        $harga = Produks::all();
        return view('finance/komponenharga',['harga'=>$harga]);
    }
}

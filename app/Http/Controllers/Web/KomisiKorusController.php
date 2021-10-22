<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KomisiKorus;

class KomisiKorusController extends Controller
{
    //

    public function index(Request $request){
        $query=KomisiKorus::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(komisi_koruses.created_at) >= '" . $tanggal_awal . "' AND date(komisi_koruses.created_at) <= '" . $tanggal_akhir . "'");
           }
        $komisikorus = $query->select('komisi_koruses.*')->orderBy('id','ASC')->get();
        return view('eccomerce/komisikorus',['data'=>$komisikorus]);
    }
}

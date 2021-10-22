<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KomisiRantus;
class KomisiRantusController extends Controller
{
    public function index(Request $request){
        $query=KomisiRantus::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(komisi_rantuses.created_at) >= '" . $tanggal_awal . "' AND date(komisi_rantuses.created_at) <= '" . $tanggal_akhir . "'");
           }
        $komisirantus = $query->select('komisi_rantuses.*')->orderBy('id','ASC')->get();
        return view('finance/komisirantus',['data'=>$komisirantus]);
    }
}

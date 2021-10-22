<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use App\User;
use App\Pesanan;
use App\umkms;

class DashboardController extends Controller
{
    public function _construct(){
        $this->middleware('auth:admin');
    }
    public function index_finance()
    {   
        return view('finance/dashboard');
    }
    public function index()
    {   
        return view('dashboard');
    }
    public function index_investor()
    {   
        return view('investor');
    }

    public function chart(){
        $user = User::select(User::raw(' COUNT(id) as total'),User::raw("created_at::timestamp::date as date"))->groupBy('date')->orderBy('date')->pluck('total','date');
        $pesanan = Pesanan::select(User::raw(' COUNT(id) as total'),User::raw("created_at::timestamp::date as date"))->groupBy('date')->orderBy('date')->pluck('total','date');
        return Chartisan::build()
            ->labels($user->keys()->toArray())
            ->dataset('Anggota', $user->values()->toArray())
            ->dataset('Pesanan', $pesanan->values()->toArray())->toJSON();
    }

    public function ukm(Request $request){
        $query=umkms::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(umkms.created_at) >= '" . $tanggal_awal . "' AND date(umkms.created_at) <= '" . $tanggal_akhir . "'");
           }
        $umkms = $query->select('umkms.*')->orderBy('id','ASC')->get();
        
        return view('finance/ukm',['ukm'=>$umkms]);
        //$ukm = umkms::all();
        //return view('eccomerce/ukm',['ukm' => $ukm]);
    }

    public function map(){
        return view('map_finance');
    }
    public function yolo(){
        $nomor =0;
        $data = Pesanan::whereMonth(
            'tanggal_pesanan', '=', date('m')
        )->get();
        foreach($data as $value){
            $nomor++;
        }

        return $nomor;
    }
}
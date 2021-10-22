<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Korus;
use App\Pesanan;
use App\KomisiRantus;
use App\PesananRantus;

class RantussController extends Controller
{
    //
    // public function __construct() {
    //     $this->middleware('auth:api');
    // }
    public function getAnggota(){
        $anggota = Korus::join('rantusses','koruses.no_rantus','=','rantusses.no_rantus')
                        ->join('users','users.id','=','rantusses.id_user')->where('rantusses.id_user',auth()->user()->id)->get();
        

        return response()->json([
            'success' => true,
            'anggota' => $anggota,]);
    }

    // public function getAnggotaPesanan($id_anggota){

    // }



    public function GetPesanan($no_korus){
       
        $pesanan = PesananRantus::where('id_korus',$no_korus)->whereIn('status_pesanan',[0,1])->get();
        
        $Korus = Korus::join('users','users.id','=','koruses.id_user')->where('no_korus',$no_korus)->select('users.name','koruses.*')->get();
        foreach($pesanan as $key => $value){
            $pesanan[$key]['pesanan'] = json_decode($value['pesanan']);
        }

        return response()->json([
            'success' => true,
            'korus' => $Korus,
            'order' => $pesanan,
            ]);
    }


    // public function TerimaPesan(request $request){
    //     foreach($request->list_pesanan as $list){
            
    //     }
    // }

    public function getKomisi($id){
        $data = KomisiRantus::where('id_rantus',$id)->get();

        if(count ($data) > 0){
            return response()->json([
                'success' => true,
                'komisi' => $data
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Komisi Tidak Ada",
                'komisi' => $data
            ]);
        }
    }

    public function getTotalKomisiBulanini($id_rantus){
        $data = KomisiRantus::where('id_rantus',$id_rantus)->whereMonth('created_at', Carbon::now()->month)->select(\DB::raw('SUM(komisi_pesanan) as total'))->value('total');
        
        if($data){
            return response()->json([
                'success' => true,
                'total' => $data
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Komisi Tidak Ada",
                'total' => $data
            ]);
        } 
    }

    public function TerimaPesanan($id){
        $pesananRantus = PesananRantus::where('id',$id)
            ->update(['status_pesanan' => 1]);       

        return response()->json([
            'success' => true,
            'message' => "Pesanan Diterima"
        ]);
    }


    public function KirimPesanan($id){
        $pesananRantus = PesananRantus::where('id',$id)
        ->update(['status_pesanan' => 2]);

        $pesananrantus = PesananRantus::where('id',$id)->value('list_id_pesanan_anggota');

        foreach(json_decode($pesananrantus) as $value){
            $pesanan = Pesanan::where('id',$value)
            ->update(['status_pesanan' => 3,]);
        }

        return response()->json([
            'success' => true,
            'message' => "Pesanan dikirim"
        ]);
    }

    public function Riwayat($kode){
        $data = PesananRantus::where('id_rantus',$kode)->where('status_pesanan',2)->get();

        foreach($data as $key => $value){
            $data[$key]['pesanan'] = json_decode($value['pesanan']);
        }

        return response()->json([
            "success" => true,
            "message" => "berhasil Memesan",
            "data" => $data,
        ]);
    }
}

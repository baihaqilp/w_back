<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesanan;
use App\KomisiRantus;
use App\KomisiKorus;
use App\Rantuss;
use App\Korus;
use App\User;
class PesananEccoController extends Controller
{
    public function index(Request $request){
        $query = Pesanan::query();
          
            $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
            $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
            if($tanggal_awal && $tanggal_akhir){
         
             $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
             $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
              
             $query->whereRaw("date(pesanans.tanggal_pesanan) >= '" . $tanggal_awal . "' AND date(pesanans.tanggal_pesanan) <= '" . $tanggal_akhir . "'");
            }
        
        $pesanan =$query->join('addresses','addresses.id','=','pesanans.alamat')
            ->join('produks','produks.id','=','pesanans.id_produk')
            ->join('users','users.id','=','pesanans.id_user')
            ->join('koruses','koruses.no_korus','=','users.kode_korus')
            ->join('rantusses','rantusses.no_rantus','=','koruses.no_rantus')
            ->select('pesanans.*', 'addresses.penerima As penerima','produks.nama_produk AS nama_produk','produks.id AS id_produk','koruses.no_korus','rantusses.no_rantus')
            ->latest()->get();
        return view('eccomerce/pesanan/pesanan',['pesanan'=>$pesanan,'tanggal_awal'=>$tanggal_awal,'tanggal_akhir'=>$tanggal_akhir]);
    }
    public function view_edit_pesanan(){
        return view('eccomerce/pesanan/EditPesanan');
    }

    public function view_pesanan_selesai(Request $request){
        $query=Pesanan::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(pesanans.created_at) >= '" . $tanggal_awal . "' AND date(pesanans.created_at) <= '" . $tanggal_akhir . "'");
           }
        $pesanan = $query->join('addresses','addresses.id','=','pesanans.alamat')
        ->join('produks','produks.id','=','pesanans.id_produk')
        ->select('pesanans.*', 'addresses.penerima As penerima','produks.nama_produk AS nama_produk')
        ->orderBy('created_at','desc')->where('status_pesanan',6)->get();

        return view('eccomerce/pesanan/pesanan_selesai',['pesanan'=>$pesanan]);
    }

    public function pesanan_selesai($id){
        
        $ganti = Pesanan::where('id',$id)->update(['status_pesanan' => '7']);
        $pesanan = Pesanan::join('users','users.id','=','pesanans.id_user')
        ->join('koruses','koruses.no_korus','=','users.kode_korus')
        ->join('rantusses','rantusses.no_rantus','=','koruses.no_rantus')
        ->where('pesanans.id',$id)->select('pesanans.*','rantusses.id as id_rantus','koruses.id as id_korus')
        ->pluck('pesanans.no_pesanan','id_rantus');
        $rantus = Rantuss::find($pesanan->keys());

        $pesanans = Pesanan::find($id);
        $pemesan = User::find($pesanans->id_user);
        $Rantus = Rantuss::join('koruses','koruses.no_rantus','=','rantusses.no_rantus')->join('users','users.id','=','rantusses.id_user')
                        ->where('koruses.no_korus',$pemesan->kode_korus)->value('fcm_token_mitra');
                
        $Korus = Korus::join('users','users.id','=','koruses.id_user')
                ->where('koruses.no_korus',$pemesan->kode_korus)->value('fcm_token_mitra');
        
        $recipients_mitra=[
            $Rantus,$Korus
        ];
        $recipients_ecommerce=[
            $pemesan->fcm_token_ecommerce  
        ];
        $notif_mitra= fcm()
            ->to($recipients_mitra) // $recipients must an array
            ->priority('normal')
            ->timeToLive(0)
            ->data([
                'name' => $pemesan->name,
                'id_user' => $pemesan->id,
                'id_pesanan' => $pesanans->id,
            ])
            ->notification([
                'title' => 'Pesanan SELESAI !!!',
                'body' => 'Pesanan telah selesai',
                "click_action"=> "FLUTTER_NOTIFICATION_CLICK"
            ])
            ->send();

        $notif_ecommerce= fcm()
            ->to($recipients_ecommerce) // $recipients must an array
            ->priority('normal')
            ->timeToLive(0)
            ->data([
                'name' => $pemesan->name,
                'id_user' => $pemesan->id,
                'id_pesanan' => $pesanans->id,
            ])
            ->notification([
                'title' => 'Pesanan SELESAI !!!',
                'body' => 'Pesanan anda telah selesai',
                "click_action"=> "FLUTTER_NOTIFICATION_CLICK"
            ])
            ->send();

        

        // return response()->json($rantus);

        if($ganti){ 
            $pesanan = Pesanan::find($id);
            $no_korus = Korus::join('users','users.kode_korus','=','koruses.no_korus')->select('koruses.*')->where('users.id',$pesanan->id_user)->pluck('no_korus');
            $korus = Korus::join('users','users.id','=','koruses.id_user')->where('koruses.no_korus',$no_korus[0])->get();
            $rantus = Rantuss::join('users','users.id','=','rantusses.id_user')->where('rantusses.no_rantus',$korus[0]->no_rantus)->get();
            
            $komisi_Korus = new KomisiKorus;
            $komisi_Korus->id_korus = $korus[0]->id_user;
            $komisi_Korus->nama_korus = $korus[0]->name;
            $komisi_Korus->no_pesanan = $pesanan->no_pesanan;
            $komisi_Korus->tanggal_pesanan = $pesanan->tanggal_pesanan;
            $komisi_Korus->komisi_pesanan = $pesanan->komisi_korus_final;
            $komisi_Korus->save();
    
            $komisi_rantus = new KomisiRantus;
            $komisi_rantus->id_rantus = $rantus[0]->id_user;
            $komisi_rantus->nama_rantus = $rantus[0]->name;
            $komisi_rantus->no_pesanan = $pesanan->no_pesanan;
            $komisi_rantus->tanggal_pesanan = $pesanan->tanggal_pesanan;
            $komisi_rantus->komisi_pesanan = $pesanan->komisi_rantus_final;
            $komisi_rantus->save();
        return redirect()->route('pesanan.view_selesai');
        }
        else{
            return redirect()->route('pesanan.view_selesai')->with('danger','TIdak bisa merubah pesanan');
        }
        
       
    }
}

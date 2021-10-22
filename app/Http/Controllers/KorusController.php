<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Korus;
use App\User;
use App\Pesanan;
use App\KomisiKorus;
use Carbon\Carbon;
use App\PesananRantus;

class KorusController extends Controller
{
    //
    // public function __construct() {
    //     $this->middleware('auth:api');
    // }
    public function getMe(){
        $anggota = User::join('koruses','koruses.no_korus','=','users.kode_korus')->where('id_user',auth()->user()->id)->get();
        return $anggota;
    }

    public function getAnggota($no_korus){
        $user = User::join('addresses','addresses.user_id','=','users.id')
                        ->join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
                        ->join('desas','desas.kode_desa' ,'=','addresses.desa')
                        ->join('kotas','kotas.kode_kota' ,'=','addresses.kota')
                        ->join('kecamatans','kecamatans.kode_kecamatan' ,'=','addresses.kecamatan')
                        ->select('users.id','users.name','users.email','users.jenis_kelamin','users.phone','provinsis.provinsi','kotas.kota','kecamatans.kecamatan','desas.desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')
                        ->groupBy('users.id','users.No_anggota_umum','users.name','users.email','users.jenis_kelamin','users.phone','provinsis.provinsi','kotas.kota','kecamatans.kecamatan','desas.desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')    
                        ->where('users.kode_korus',$no_korus)->get();
            return response()->json([
                'success' => true,
                'anggota' => $user,]);
    }

    public function getAnggotaPesan($no_korus){
        $pesanan = User::join('addresses','addresses.user_id','=','users.id')
                        ->join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
                        ->join('desas','desas.kode_desa' ,'=','addresses.desa')
                        ->join('kotas','kotas.kode_kota' ,'=','addresses.kota')
                        ->join('kecamatans','kecamatans.kode_kecamatan' ,'=','addresses.kecamatan')
                        ->join('pesanans','pesanans.id_user','=','users.id')
                        ->select('users.id','users.name','users.email','users.jenis_kelamin','users.phone','provinsis.provinsi','kotas.kota','kecamatans.kecamatan','desas.desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos','users.kode_korus')
                        ->where('users.kode_korus',$no_korus)
                        ->groupBy('users.id','users.name','users.email','users.jenis_kelamin','users.phone','provinsis.provinsi','kotas.kota','kecamatans.kecamatan','desas.desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos','users.kode_korus','pesanans.updated_at')    
                        ->orderBy('pesanans.updated_at','DESC')->get();
        
        
        // Pesanan::join('users','users.id','=','pesanans.id_user')
        //                     ->join('addresses','addresses.id','=','pesanans.alamat')
        //                     ->join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
        //                     ->join('desas','desas.kode_desa' ,'=','addresses.desa')
        //                     ->join('kotas','kotas.kode_kota' ,'=','addresses.kota')
        //                     ->join('kecamatans','kecamatans.kode_kecamatan' ,'=','addresses.kecamatan')
        //                     ->select('users.id','users.name','users.email','users.jenis_kelamin','users.phone','provinsis.provinsi','kotas.kota','kecamatans.kecamatan','desas.desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')
        //                     ->groupBy('users.id','users.name','users.email','users.jenis_kelamin','users.phone','provinsis.provinsi','kotas.kota','kecamatans.kecamatan','desas.desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')
        //                     ->where('users.kode_korus',$no_korus)->get();
                            
        return response()->json([
                'success' => true,
                'anggota' => $pesanan,]);
    }

    public function transaksiBulananKorus($id){
        $korus = Korus::where('id_user', $id)->get('no_korus');
        $transaksibulanan =0;
            foreach($korus as $i){
                $no_korus = $i['no_korus'];
            }

            $total = Pesanan::join('users','pesanans.id_user' , '=','users.id')
                            ->select('pesanans.total_pembayaran')->where('users.kode_korus',$no_korus)
                            ->whereMonth('pesanans.created_at', date('m'))
                            ->where('status_pesanan',6)
                            ->get();
            foreach($total as $a){

                $transaksibulanan += $a['total_pembayaran'];
            }

            return $transaksibulanan;
    }

    public function totalpesanankorus($id){
        $korus = Korus::where('id_user', $id)->get('no_korus');
        foreach($korus as $i){
            $no_korus = $i['no_korus'];
        }

        $total = Pesanan::join('users','pesanans.id_user' , '=','users.id')
                        ->select('pesanans.*')->where('users.kode_korus',$no_korus)
                        ->whereMonth('pesanans.created_at', date('m'))
                        ->get();

        return $total;
    }

    public function Komisi_Korus($id){
        $korus = Korus::where('id_user', $id)->get('no_korus');
        $komisibulanan =0;
            foreach($korus as $i){
                $no_korus = $i['no_korus'];
            }

            $total = Pesanan::join('users','pesanans.id_user' , '=','users.id')
                            ->select('pesanans.komisi_korus')->where('users.kode_korus',$no_korus)
                            ->whereMonth('pesanans.created_at', date('m'))
                            ->where('status_pesanan',6)
                            ->get('id');
            foreach($total as $a){

                $komisibulanan += $a['komisi_korus'];
            }

            return $komisibulanan;
    }

    public function getKomisi($id_korus){
        $data = KomisiKorus::where('id_korus',$id_korus)->get();
        
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


    public function getTotalKomisiBulanini($id_korus){
        $data = KomisiKorus::where('id_korus',$id_korus)->whereMonth('created_at', Carbon::now()->month)->select(\DB::raw('SUM(komisi_pesanan) as total'))->value('total');
        
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


    public function getPesanan($id){
        $pesanan = Pesanan::join('produks','produks.id','=','pesanans.id_produk')
        ->join('addresses','addresses.id','=','pesanans.alamat')
        ->join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
        ->join('desas','desas.kode_desa' ,'=','addresses.desa')
        ->join('kotas','kotas.kode_kota' ,'=','addresses.kota')
        ->join('kecamatans','kecamatans.kode_kecamatan' ,'=','addresses.kecamatan')
        ->where('id_user',$id)
        ->select('produks.nama_produk AS nama_barang','pesanans.*','provinsis.provinsi AS nama_provinsi','kotas.kota AS nama_kota','kecamatans.kecamatan AS nama_kecamatan','desas.desa AS nama_desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')
        ->orderBy('pesanans.updated_at','DESC')->get();
        

        return response()->json([
            'success' => true,
            'pesanan' => $pesanan
        ]);
    }

    public function GetKomulatif($no_korus){
        $pesanan = Pesanan::join('users','users.id','=','pesanans.id_user')->join('produks','produks.id','=','pesanans.id_produk')
        ->join('koruses','koruses.no_korus','=','users.kode_korus')
        ->where('status_pesanan',1)
        ->where('users.kode_korus',$no_korus)->select('produks.id as id_produk','nama_produk',\DB::raw('SUM(summary_pesanan) as jumlah_barang'))->groupBy('produks.id','nama_produk')->get();
        $list_pesanan = Pesanan::join('users','users.id','=','pesanans.id_user')->join('produks','produks.id','=','pesanans.id_produk')
        ->join('koruses','koruses.no_korus','=','users.kode_korus')
        ->select('pesanans.id')
        ->where('status_pesanan',1)->where('users.kode_korus',$no_korus)->get();
        return response()->json([
            'success' => true,
            'pesanan' => $pesanan,
            'list_pesanan' =>$list_pesanan
            ]);
    }

    public function PesanRantus(Request $request){
        $id_korus = $request->id_korus;
        
        // foreach($request['pesanan'] as $value){
        //     $pesanan[]  =$value;
        // }

        foreach($request['list_pesanan'] as $val){
            $list_id_pesanan_anggota[] = $val;
            $pesanan = Pesanan::where('id',$val)
            ->update(['status_pesanan' => 2,]);
        }

        $no_rantus = Korus::where('no_korus',$id_korus)->value('no_rantus');

        $pesan = new PesananRantus;
        $pesan->id_korus = $id_korus;
        $pesan->pesanan =  json_encode($request['pesanan']);
        $pesan->list_id_pesanan_anggota = json_encode($list_id_pesanan_anggota);
        $pesan->status_pesanan = 0;
        $pesan->id_rantus = $no_rantus;
        $pesan->save();

        return response()->json([
            "success" => true,
            "message" => "berhasil Memesan",
        ]);

    }


    public function riwayat($kode){
        $data = Pesanan::join('produks','produks.id','=','pesanans.id_produk')
        ->join('addresses','addresses.id','=','pesanans.alamat')
        ->join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
        ->join('desas','desas.kode_desa' ,'=','addresses.desa')
        ->join('kotas','kotas.kode_kota' ,'=','addresses.kota')
        ->join('kecamatans','kecamatans.kode_kecamatan' ,'=','addresses.kecamatan')
        ->join('users','users.id','=','pesanans.id_user')
        ->where('users.kode_korus',$kode)
        ->select('produks.nama_produk AS nama_barang','pesanans.*','provinsis.provinsi AS nama_provinsi','kotas.kota AS nama_kota','kecamatans.kecamatan AS nama_kecamatan','desas.desa AS nama_desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')
        ->orderBy('pesanans.updated_at','DESC')->whereIn('pesanans.status_pesanan',[8,9])->get();
        return response()->json([
            "success" => true,
            "message" => "berhasil Memesan",
            "data" => $data,
        ]);
    }

}

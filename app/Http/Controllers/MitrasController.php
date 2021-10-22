<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pesanan;
use App\Korus;
use App\Rantuss;
use App\User;

class MitrasController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function getAnggota(request $request, $id_user){

        if($request->is_korus == true && $request->is_rantus == false){
            $korus = Korus::where('id_user',$id_user)->get('no_korus');

            foreach($korus as $i){
                $kode = $i->no_korus;
            }
            

            $user = User::join('addresses','addresses.user_id','=','users.id')
                        ->join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
                        ->join('desas','desas.kode_desa' ,'=','addresses.desa')
                        ->join('kotas','kotas.kode_kota' ,'=','addresses.kota')
                        ->join('kecamatans','kecamatans.kode_kecamatan' ,'=','addresses.kecamatan')
                        ->select('users.*','provinsis.provinsi','kotas.kota','kecamatans.kecamatan','desas.desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')
                        ->where('kode_korus',$kode)->get();
            return response()->json([
                'success' => true,
                'anggota' => $user,]);
        }else{
            $rantus = Rantuss::where('id_user',$id_user)->get('no_rantus');

            if (count($rantus)>0){
                foreach($rantus as $i){
                    $kode = $i->no_rantus;
                }
                
                $user = Korus::join('users','users.id','=','koruses.id_user')
                                ->join('addresses','addresses.user_id','=','users.id')
                                ->select('users.name','koruses.*')
                                ->where('no_rantus',$kode)->get();
                
                return response()->json([
                    'success' => true,
                    'Korus' => $user,
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'kode rantus tidak ada',
                ]);
            }
        } 
        
    }

    public function permintaanStok (request $request){
        $insert = DB::table('permintaan_stoks')->insert([
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'daerah' => $request->daerah,
            'permintaan' => $request->permintaan,
            'catatan' => $request->catatan,
        ]);

        if($insert){
            return response()->json([
                'success' => true,
                'messages'=> 'Permintaan telah berhasil dibuat'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'messages'=> 'Permintaan gagal dibuat'
            ]);
        }
    }



    public function getKomisiDetail(request $request, $id_user){
        if($request->is_korus == true && $request->is_rantus == false){
            $korus = Korus::where('id_user',$id_user)->get('no_korus');

            foreach($korus as $i){
                $kode = $i->no_korus;
            }
            

            $pesanan = Korus::join('users','users.kode_korus','=','koruses.no_korus')
                            ->join('pesanans','pesanans.id_user','=','users.id')
                            ->select('pesanans.*')
                            ->where('koruses.no_korus',$kode)->paginate(10);
            return response()->json([
                'success' => true,
                'komisi' => $pesanan->appends([
                                                'is_korus' => $request->is_korus,
                                                'is_rantus' => $request->is_rantus,    
                                            ]),]);
        }else{
            $rantus = Rantuss::where('id_user',$id_user)->get('no_rantus');

            if (count($rantus)>0){
                foreach($rantus as $i){
                    $kode = $i->no_rantus;
                }
                
                
                $user = Rantuss::join('koruses','koruses.no_rantus','=','rantusses.no_rantus')
                                ->join('users','users.kode_korus','=','koruses.no_korus')
                                ->join('pesanans','pesanans.id_user','=','users.id')
                                ->select('pesanans.*')
                                ->where('rantusses.no_rantus',$kode)->paginate(10);
                
                return response()->json([
                    'success' => true,
                    'komisi' => $user,
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'kode rantus tidak ada',
                ]);
            }
        }
    }
}

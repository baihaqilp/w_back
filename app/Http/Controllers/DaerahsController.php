<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provinsi;
use App\Kotas;
use App\Kecamatans;
use App\Desas;

class DaerahsController extends Controller
{
    //
    public function getAllProvinsi(){

        $provinsi=Provinsi::all();
        return response()->json([
            'success' => true,
            'provinsi' => $provinsi,
        ]);
    }

    public function provinsi($id){  
        $provinsi = Provinsi::where('kode_provinsi',$id)->get();

        return response()->json([
            'success' => true,
            'provinsi' => $provinsi,
        ]);
        
    }

    public function kota(request $request){
        
        $kode_provinsi = $request->kode_provinsi;
        $kota = Kotas::where('kode_provinsi',$kode_provinsi)->get();

        return response()->json([
            'success' => true,
            'provinsi' => $kota,
        ]);
        
    }
    public function kotadetail($id){ 
        $kota = Kotas::where('kode_kota',$id)->get();

        return response()->json([
            'success' => true,
            'provinsi' => $kota,
        ]);;
        
    }

    public function kecamatan(request $request){
        
        $kode_kota = $request->kode_kota;
        $kecamatan = Kecamatans::where('kode_kota',$kode_kota)->get();

        return response()->json([
            'success' => true,
            'provinsi' => $kecamatan,
        ]);
        
    }
    public function kecamatandetail($id){ 
        $kecamatan = Kecamatans::where('kode_kecamatan',$id)->get();

        return response()->json([
            'success' => true,
            'provinsi' => $kecamatan,
        ]);
        
    }

    public function desa(request $request){
        
        $kode_desa = $request->kode_kecamatan;
        $desa = Desas::where('kode_kecamatan',$kode_desa)->get();

        return response()->json([
            'success' => true,
            'provinsi' => $desa,
        ]);
        
    }
    public function desadetail($id){ 
        $desa = Desas::where('kode_desa',$id)->get();

        return response()->json([
            'success' => true,
            'provinsi' => $desa,
        ]);
        
    }
}

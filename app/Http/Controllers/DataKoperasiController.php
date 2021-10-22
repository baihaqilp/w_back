<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DataKoperasiController extends Controller
{
    //
    // public function __construct() {
    //     $this->middleware('auth:api');
    // }

    public function getAnggota(){
        $anggota = User::join('addresses','addresses.user_id','=','users.id')
                       ->join('provinsis', 'kode_provinsi','=','addresses.provinsi')
                       ->join('kotas', 'kode_kota','=','addresses.kota')
                       ->join('kecamatans', 'kode_kecamatan','=','addresses.kecamatan')
                       ->join('desas', 'kode_desa','=','addresses.desa')->where('users.is_anggota',true)->orderBy('users.id','asc')
                       ->select('users.*','addresses.*','provinsis.provinsi AS provinsi_label','kotas.kota AS kota_label','kecamatans.kecamatan AS kecamatan_label','desas.desa AS desa_label')
                       ->get();
        
        return response()->json([
            'success' => true,
            'data' => $anggota,
        ]);
    }

}

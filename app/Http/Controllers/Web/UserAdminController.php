<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserAdminController extends Controller
{
    public function index(Request $request)
    {
        $query=User::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(users.created_at) >= '" . $tanggal_awal . "' AND date(users.created_at) <= '" . $tanggal_akhir . "'");
           }
        $user = $query->join('addresses','addresses.user_id','=','users.id')
        ->join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
        ->join('desas','desas.kode_desa' ,'=','addresses.desa')
        ->join('kotas','kotas.kode_kota' ,'=','addresses.kota')
        ->join('kecamatans','kecamatans.kode_kecamatan' ,'=','addresses.kecamatan')
        ->select('users.id','users.name','users.email','users.jenis_kelamin','users.phone','provinsis.provinsi','kotas.kota','kecamatans.kecamatan','desas.desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')
        ->groupBy('users.id','users.name','users.email','users.jenis_kelamin','users.phone','provinsis.provinsi','kotas.kota','kecamatans.kecamatan','desas.desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')
        ->where('is_main_address',true)->get();
        
        return view('eccomerce/user',['user'=>$user,'tanggal_awal' =>$tanggal_awal,'tanggal_akhir'=>$tanggal_akhir]);
    }
}

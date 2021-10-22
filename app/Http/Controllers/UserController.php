<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Addresses;
use App\User;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function updateProfile() {
        $attributes = request()->validate(['name' => 'nullable|string']);

        auth()->user()->update($attributes);

        return $this->respondWithMessage("User successfully updated");
    }

    public function updateFoto(request $request, $id){
        $images=$request->validate([
            'profil' => 'mimes:jpeg,png,jpg|max:10240',
        ]);
        $imagesname = date("h:i:s")."_".$request->file('profil')->getClientOriginalName();
            
        if(User::where('id',$id)->update(['profil' => $imagesname])){
            
            Storage::disk('foto')->putFileAs('/',$request->file('profil'),$imagesname);

            return $this->respondWithMessage("Update Foto Berhasi");
        }

        
    }

    public function updateAlamat(request $request,$id){

        $validate = request()->validate([
            'penerima' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat_lengkap' => 'required',
            'rt_rw' => 'required',
            'kode_pos' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $penerima = $request->penerima;
        $provinsi = $request->provinsi;
        $kota = $request->kota;
        $kecamatan = $request->kecamatan;
        $desa = $request->desa;
        $alamat_lengkap = $request->alamat_lengkap;
        $rt_rw = $request->rt_rw;
        $kode_pos = $request->kode_pos;
        $lat = $request->lat;
        $lng = $request->lng;

        $alamat = Addresses::where('id',$id)->update([
            'penerima' => $penerima,
            'provinsi' => $provinsi,
            'kota' => $kota,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'alamat_lengkap' => $alamat_lengkap,
            'rt_rw' => $rt_rw,
            'kode_pos' => $kode_pos,
            'lat' => $lat,
            'lng' => $lng,
        ]);

    }

    public function updateAkun(request $request,$id){
        $nama = $request->name;
        $jenis_kelamin = $request->jenis_kelamin;
        $phone = $request->phone;
        $penerima = $request->penerima;
        $provinsi = $request->provinsi;
        $kota = $request->kota;
        $kecamatan = $request->kecamatan;
        $desa = $request->desa;
        $alamat_lengkap = $request->alamat_lengkap;
        $rt_rw = $request->rt_rw;
        $kode_pos = $request->kode_pos;
        $lat = $request->lat;
        $lng = $request->lng;

        $user = User::where('id',$id)->update([
            'name' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'phone' => $phone
        ]);
        $alamat = Addresses::where('user_id',$id)->where('is_main_address',true)->update([
            'penerima' => $nama,
            'provinsi' => $provinsi,
            'kota' => $kota,
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'alamat_lengkap' => $alamat_lengkap,
            'rt_rw' => $rt_rw,
            'kode_pos' => $kode_pos,
            'lat' => $lat,
            'lng' => $lng,
        ]);
        
        
        $getAlamat = Addresses::join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
        ->join('desas','desas.kode_desa' ,'=','addresses.desa')
        ->join('kotas','kotas.kode_kota' ,'=','addresses.kota')
        ->join('kecamatans','kecamatans.kode_kecamatan' ,'=','addresses.kecamatan')
        ->select('addresses.*','provinsis.provinsi AS provinsi_label','kotas.kota AS kota_label','kecamatans.kecamatan AS kecamatan_label','desas.desa AS desa_label','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')->where('user_id',$id)->get();
        return $this->respond([
            'user' => auth()->user(),
            'alamat' => $getAlamat
        ]);
    }
}



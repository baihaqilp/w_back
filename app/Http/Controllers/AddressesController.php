<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Addresses;

class AddressesController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }


    public function getAddress($id_user){
       $alamat =User::find($id_user)->addresses;
       return response()->json([
            'success' => true,
            'alamat' => $alamat,]);
    }

    public function addAddress(request $request){

            $alamat = new Addresses;
            $alamat->user_id = $request->id_user;
            $alamat->penerima = $request->penerima;
            $alamat->provinsi = $request->provinsi;
            $alamat->kota = $request->kota;
            $alamat->kecamatan = $request->kecamatan;
            $alamat->desa = $request->desa;
            $alamat->alamat_lengkap = $request->alamat_lengkap;
            $alamat->rt_rw = $request->rt_rw;
            $alamat->kode_pos = $request->kode_pos;
            $alamat->lat = $request->lat;
            $alamat->lng = $request->lng;
            $saved = $alamat->save();

            if(! $saved){
                return response()->json([
                    'success' => false,
                    'message' => 'data tidak berhasil di input',
                ]);
            }else{
                return response()->json([
                    'success' => true,
                    'message' => 'data berhasil di input',
                    'alamat' => $alamat,
                ]);
            }
        

        
    }

    public function updateMainaddress(request $request){
               
        $id = $request->id_alamat;   
        if(Addresses::find($id)){
            $main = Addresses::where('user_id',$request->id_user)->where('is_main_address',true)->update(['is_main_address' => false] );
            $Addresses = Addresses::where('id',$id)
            ->update(['is_main_address' => true,]);

            return response()->json([
            'success' => true,
            'message' => 'Alamat Utama telah dirubah'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'alamat tidak ditemukan'
                ]);
        }
    }

    public function getbyIdAddress(request $request, $id){
        $address = Addresses::find($id);
        
        if($address){
            return response()->json([
            'success' => true,
            'alamat' => $address
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'alamat tidak ditemukan'
                ]);
        }
    }
}

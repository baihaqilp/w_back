<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\User;
use App\Addresses;
use App\Korus;

class RegistrationController extends Controller
{
    /**
     * Register User
     *
     * @param RegistrationRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register(RegistrationRequest $request) {
        try {
            if($request->kode_korus == null){
                $user=User::create($request->getAttributes());
                    $user->sendEmailVerificationNotification();
                    Addresses::create([
                        'user_id' => $user->id,
                        'penerima' => $request->name,
                        'provinsi' => $request->provinsi,
                        'kota' => $request->kota,
                        'kecamatan' => $request->kecamatan,
                        'desa' => $request->desa,
                        'alamat_lengkap' => $request->alamat_lengkap,
                        'rt_rw' => $request->rt_rw,
                        'kode_pos' => $request->kode_pos,
                        'lat' => $request->lat,
                        'lng' => $request->lng,
                        'is_main_address' => 1,
                    ]);

                    $no = count(User::join('addresses','addresses.user_id','=','users.id')->where('addresses.kota',$request->kota)->get());
                
                    $no_anggota_umum = 'U-'.$request->kota.'.'.str_pad($no,6,"0", STR_PAD_LEFT);  
                    User::where('id',$user->id)->update(array('No_anggota_umum' => $no_anggota_umum,
                                                                'kode_korus' => "K.".$request->provinsi.".".$request->kota."0000"));

                return $this->respondWithMessage('Success data telah berhasil dibuat');
            }else{
                $checkkode = Korus::where('no_korus',$request->kode_korus)->get();
                if(count($checkkode)>0){
                    $user=User::create($request->getAttributes());
                    $user->sendEmailVerificationNotification();
                    Addresses::create([
                        'user_id' => $user->id,
                        'penerima' => $request->name,
                        'provinsi' => $request->provinsi,
                        'kota' => $request->kota,
                        'kecamatan' => $request->kecamatan,
                        'desa' => $request->desa,
                        'alamat_lengkap' => $request->alamat_lengkap,
                        'rt_rw' => $request->rt_rw,
                        'kode_pos' => $request->kode_pos,
                        'lat' => $request->lat,
                        'lng' => $request->lng,
                        'is_main_address' => 1,
                    ]);

                    $no = count(User::join('addresses','addresses.user_id','=','users.id')->where('addresses.kota',$request->kota)->get());
                
                    $no_anggota_umum = 'U.'.$request->kota.'.'.str_pad($no,6,"0", STR_PAD_LEFT);  
                    User::where('id',$user->id)->update(array('No_anggota_umum' => $no_anggota_umum));

                    return $this->respondWithMessage('Success data telah berhasil dibuat');
                
                }else{
                    return response()->json([
                        'success' => false,
                        'message' => "Kode Korus Tidak Ada, Pastikan Kode Sudah Benar."
                    ]);
                }
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th);
        }
    }
}

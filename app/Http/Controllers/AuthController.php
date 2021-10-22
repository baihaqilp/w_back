<?php

namespace App\Http\Controllers;

use App\ApiCode;
use App\User;
use App\Addresses;
use App\Pesanan;
use App\Korus;
use App\Rantuss;
use App\Provinsi;
use App\Kotas;
use App\Kecamatans;
use App\Desas;
use App\KomisiKorus;
use App\KomisiRantus;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login() {
        $credentials = request()->validate([
            'email' => 'required|email', 'password' => 'required|string|max:25']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->respondUnAuthorizedRequest(ApiCode::INVALID_CREDENTIALS);
        }

        return $this->respondWithToken($token,request()->role);
    }


    private function respondWithToken($token,$credentials) {
        return $this->respond([
            'token' => $token,
            'access_type' => 'bearer',
            'role'=> $credentials
            ,
        ], "Login Successful");
    }


    public function logout() {
        auth()->logout();
        return $this->respondWithMessage('User successfully logged out');
    }


    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }

    public function me() {
        $id = auth()->user()->id;
        $alamat = Addresses::where('user_id', $id)->where('is_main_address',true)
                            ->join('provinsis', 'kode_provinsi','=','addresses.provinsi')
                            ->join('kotas', 'kode_kota','=','addresses.kota')
                            ->join('kecamatans', 'kode_kecamatan','=','addresses.kecamatan')
                            ->join('desas', 'kode_desa','=','addresses.desa')
                            ->select('addresses.*','provinsis.provinsi AS provinsi_label','kotas.kota AS kota_label','kecamatans.kecamatan AS kecamatan_label','desas.desa AS desa_label')
                            ->get();
        
        return $this->respond([
            'user' => auth()->user(),
            'alamat' => $alamat,
        ]);
    }

    public function mitraMe() {
        $id = auth()->user()->id;
        $rantus = Rantuss::where('id_user',$id)->get();
        $korus = Korus::where('id_user',$id)->get();
        $alamat = Addresses::where('user_id', $id)
        ->join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
        ->join('desas','desas.kode_desa' ,'=','addresses.desa')
        ->join('kotas','kotas.kode_kota' ,'=','addresses.kota')
        ->join('kecamatans','kecamatans.kode_kecamatan' ,'=','addresses.kecamatan')
        ->where('is_main_address',true)
        ->select('addresses.*','provinsis.provinsi as label_provinsi','kotas.kota as label_kota','kecamatans.kecamatan as label_kecamatan','desas.desa as label_desa')->get();
        
        $is_korus = auth()->user()->is_korus;
        $is_rantus = auth()->user()->is_rantus;

        if( $_GET['role'] == 'Korus'){
            $transaksibulanan = $this->transaksiBulananKorus($id);
            $komisibulanan = $this->Komisi_Korus(Korus::where('id_user',$id)->value('id'));


            return $this->respond([
                'user' => auth()->user(),
                'role' => $_GET['role'],
                'rantus' => $rantus,
                'korus' => $korus,
                'alamat' => $alamat,
                'transaksi_bulanan' => $transaksibulanan,
                'total_transaksi' => count($this->totalpesanankorus($id)),
                'komisi_bulanan' => (int)$komisibulanan
            ]);
        }else if( $_GET['role'] == 'Rantus'){
            $rantus = Rantuss::where('id_user',$id)->get();
            $transaksibulanan =0;
            $totaltransaksi = 0;
            foreach($rantus as $j)
                $no_rantus = $j['no_rantus'];
            $komisibulanan = $this->Komisi_Rantus($no_rantus);
            $id_korus = Korus::where('no_rantus',$no_rantus)->get();
            foreach($id_korus as $j){
                $transaksibulanan += $this->transaksiBulananKorus($j['id_user']);
                $totaltransaksi += count($this->totalpesanankorus($j['id_user']));
            }

            return $this->respond([
                'user' => auth()->user(),
                'rantus' => $rantus,
                'korus' => $korus,
                
                'alamat' => $alamat,
                'transaksi_bulanan' => $transaksibulanan,
                'total_transaksi' => $totaltransaksi,
                'komisi_bulanan' => (int)$komisibulanan
            ]);

            
        }    
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



    public function Komisi_Korus($id_korus){
            
            $Komisi = KomisiKorus::where('id_korus',$id_korus)
                                ->whereMonth('created_at', date('m'))
                                ->select(\DB::raw('SUM(komisi_pesanan) as komisi'))
                                ->value('komisi');
            
            return $Komisi;
    }


    public function Komisi_Rantus($no_rantus){
        
        // $komisibulanan =0;

        //     $korus = Korus::where('no_rantus',$no_rantus)->get('no_korus');
        
        
        //     $x = 0;      

        //     if(count($korus) >0){
        //         foreach($korus as $i){
        //             $total[$x] = Pesanan::join('users','pesanans.id_user' , '=','users.id')
        //                         ->select('pesanans.komisi_rantus')->where('users.kode_korus',$i['no_korus'])
        //                         ->whereMonth('pesanans.created_at', date('m'))
        //                         ->where('status_pesanan',7)
        //                         ->get();
        //             $x++;
        //         }
                
        //       foreach($total[0] as $j)
        //             $komisibulanan += $j['komisi_rantus'];
        //     }
            

        //     return $komisibulanan;
        $Komisi = KomisiRantus::where('id_rantus',$no_rantus)
                                ->whereMonth('created_at', date('m'))
                                ->select(\DB::raw('SUM(komisi_pesanan) as komisi'))
                                ->value('komisi');
            
            return $Komisi;
    }


    public function lupaPassword(){
        $input = $request->all();
        $rules = array(
            'email' => "required|email",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            try {
                $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                    $message->subject($this->getEmailSubject());
                });
                switch ($response) {
                    case Password::RESET_LINK_SENT:
                        return \Response::json(array("status" => 200, "message" => trans($response), "data" => array()));
                    case Password::INVALID_USER:
                        return \Response::json(array("status" => 400, "message" => trans($response), "data" => array()));
                }
            } catch (\Swift_TransportException $ex) {
                $arr = array("status" => 400, "message" => $ex->getMessage(), "data" => []);
            } catch (Exception $ex) {
                $arr = array("status" => 400, "message" => $ex->getMessage(), "data" => []);
            }
        }
        return \Response::json($arr);
    }

}

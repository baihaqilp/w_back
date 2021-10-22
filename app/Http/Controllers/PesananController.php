<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pesanan;
use App\User;
use App\Korus;
use App\Rantuss;
use App\Angggotas;
use App\Addresses;
use Carbon\Carbon;

class PesananController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function index(){
        return response()->json([
            'success' => true,
            'pesanan' => Pesanan::all(),]);
        
    }
    public function create(request $request){                   
        $nomor = 0;
        $korus = User::join('koruses','koruses.id_user','=','users.id')->where('no_korus',auth()->user()->kode_korus)->value('fcm_token_mitra');
        $recipients = [$korus];
        $data = Pesanan::whereMonth(
            'tanggal_pesanan', '=', date('m')
        )->get();
        foreach($data as $value){
            $nomor++;
        }
        foreach ($request['barang'] as $j){
            
            $pesanan = new Pesanan;

            $id = $request->id_user;
            $user = User::find($id);
            $id = $request->alamat;
            $alamat = Addresses::find($id);
            if($user->is_anggota == false && $user->is_korus==false && $user->is_rantus == false){
                //$anggota = Anggotas::where('id_user',$user->id_user)->get();
                $pesanan->no_pesanan = "PO.1.".$alamat->provinsi.".".substr($alamat->kota,-2,2).".".date('Y').".".date('m').".".str_pad($nomor++,6,"0", STR_PAD_LEFT);
            }elseif($user->is_anggota == true){
                $pesanan->no_pesanan = "PO.0.".$alamat->provinsi.".".substr($alamat->kota,-2,2).".".date('Y').".".date('m').".".str_pad($nomor++,6,"0", STR_PAD_LEFT);
            }elseif($user->is_rantus == true || $user->is_korus == true){
                $pesanan->no_pesanan = "SL.0.".$alamat->provinsi.".".substr($alamat->kota,-2,2).".".date('Y').".".date('m').".".str_pad($nomor++,6,"0", STR_PAD_LEFT);
            }
            $quantity = $j['quantity'];
            $komisi_korus = round(($j['margin']*0.4788))* $quantity;
            $komisi_rantus = round(($j['margin']*0.0532))* $quantity;

            if(($komisi_korus / $quantity)< 400){
                $komisi_korus_final = 400*$quantity;
            }else{
                $komisi_korus_final = $komisi_korus;
            }

            if(($komisi_rantus / $quantity)< 50){
                $komisi_rantus_final = 50*$quantity;
            }else{
                $komisi_rantus_final = $komisi_rantus;
            }
    
            $pesanan->id_user = $request->id_user;
            $pesanan->tanggal_pesanan = $request->tanggal_pesanan;
            $pesanan->jam = $request->jam;
            $pesanan->id_produk = $j['id_produk'];
            $pesanan->harga_produk = $j['harga_produk'];
            $pesanan->alamat = $request->alamat;
            $pesanan->metode_pembayaran = $request->metode_pembayaran;
            $pesanan->kode_promo = $request->kode_promo;
            $pesanan->summary_pesanan = $j['quantity'];
            $pesanan->summary_ongkir = $request->ongkir*$j['quantity'];
            $pesanan->total_pembayaran = ($j['harga_produk']*$j['quantity'])+($request->ongkir*$j['quantity']);
            $pesanan->komisi_korus = round(($j['margin']*0.4788))* $j['quantity'];
            $pesanan->komisi_rantus = round(($j['margin']*0.0532))* $j['quantity'];
            $pesanan->komisi_korus_final = $komisi_korus_final;
            $pesanan->komisi_rantus_final = $komisi_rantus_final;
            $pesanan->save();
        }

        $notif = fcm()
        ->to($recipients) // $recipients must an array
        ->priority('normal')
        ->timeToLive(0)
        ->data([
            'name' => auth()->user()->name,
            'id_user' => auth()->user()->id,
        ])
        ->notification([
            'title' => 'Pesanan Baru',
            'body' => 'Pesanan Baru Dari '.auth()->user()->name,
        ])
        ->send();
        
            return response()->json([
                'success' => true,
                'pesanan' => $pesanan,
                'message' => 'Pesan Berhasil',
                'notif' => $notif
            ]);

    }

    public function update(request $request,$id){

        $no_pesanan = $request->no_pesanan;
        $id_user = $request->id_user;
        $tanggal_pesanan = $request->tanggal_pesanan;
        $jam = $request->jam;
        $alamat = $request->alamat;
        $metode_pembayaran = $request->metode_pembayaran;
        $kode_promo = $request->kode_promo;
        $detail_pembayaran = $request->detail_pembayaran;
        $summary_pesanan = $request->summary_pesanan;
        $summary_ongkir = $request->summary_ongkir;
        $total_pembayaran = $request->total_pembayaran;

        $pesanan = Pesanan::find($id);
        $pesanan->no_pesanan = $no_pesanan;
        $pesanan->id_user = $id_user;
        $pesanan->tanggal_pesanan = $tanggal_pesanan;
        $pesanan->jam = $jam;
        $pesanan->alamat = $alamat;
        $pesanan->metode_pembayaran = $metode_pembayaran;
        $pesanan->kode_promo = $kode_promo;
        $pesanan->detail_pembayaran = $detail_pembayaran;
        $pesanan->summary_pesanan = $summary_pesanan;
        $pesanan->summary_ongkir = $summary_ongkir;
        $pesanan->total_pembayaran = $total_pembayaran;
        if($pesanan->save())
            return response()->json([
                'success' => true,
                'produk' => $product
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, produk could not be Updated'
            ], 500);
    }

    public function delete(request $request, $id)
    {
        # code...
        
        $product = Pesanan::find($id);
        $product->delete();

        return response()->json([
            'success' => true,
            'data' => "deleted"
        ]);
    }


    public function getMethodPembayaran(){

    }


    public function getByIdPesanan(request $request, $id ){
        $pesanan = Pesanan::join('produks','produks.id','=','pesanans.id_produk')
        ->join('addresses','addresses.id','=','pesanans.alamat')
        ->join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
        ->join('desas','desas.kode_desa' ,'=','addresses.desa')
        ->join('kotas','kotas.kode_kota' ,'=','addresses.kota')
        ->join('kecamatans','kecamatans.kode_kecamatan' ,'=','addresses.kecamatan')
        ->where('pesanans.id',$id)
        ->select('produks.nama_produk AS nama_barang','pesanans.*','provinsis.provinsi AS nama_provinsi','kotas.kota AS nama_kota','kecamatans.kecamatan AS nama_kecamatan','desas.desa AS nama_desa','addresses.alamat_lengkap','addresses.rt_rw','addresses.kode_pos')
        ->orderBy('pesanans.updated_at','DESC')->get();
        

        return response()->json([
            'success' => true,
            'pesanan' => $pesanan
        ]);
    }

    public function getByIdUserPesanan(request $request, $id ){
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


    public function updatestatus(request $request,$id){
        $pesanans = Pesanan::find($id);
        if($pesanans){
            $pesanan = Pesanan::where('id',$id)
            ->update(['status_pesanan' => $request->status_pesanan,]);
            $status= Pesanan::where('id',$id)->value('status_pesanan');
            $pemesan = User::find($pesanans->id_user);
            switch ($status) {
                case 1:
                
                $Rantus = Rantuss::join('koruses','koruses.no_rantus','=','rantusses.no_rantus')->join('users','users.id','=','rantusses.id_user')
                        ->where('koruses.no_korus',$pemesan->kode_korus)->value('fcm_token_mitra');
                
                $recipients_mitra=[
                    $Rantus
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
                        'title' => 'Pesanan diproses',
                        'body' => 'Pesanan telah diterima korus',
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
                        'title' => 'Pesanan diproses',
                        'body' => 'Pesanan telah diterima korus',
                        "click_action"=> "FLUTTER_NOTIFICATION_CLICK"
                    ])
                    ->send();
                  break;
                case 2:
                
                    $Korus = Korus::join('users','users.id','=','koruses.id_user')
                            ->where('koruses.no_korus',$pemesan->kode_korus)->value('fcm_token_mitra');
                    
                    $recipients_mitra=[
                        $Korus
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
                            'title' => 'Pesanan dalam proses',
                            'body' => 'Pesanan dalam proses rantus',
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
                            'title' => 'Pesanan dalam proses',
                            'body' => 'Pesanan dalam proses rantus',
                            "click_action"=> "FLUTTER_NOTIFICATION_CLICK"
                        ])
                        ->send();
                    break;
                
                case 3:
                
                    $Korus = Korus::join('users','users.id','=','koruses.id_user')
                    ->where('koruses.no_korus',$pemesan->kode_korus)->value('fcm_token_mitra');
            
                    $recipients_mitra=[
                        $Korus
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
                            'title' => 'Pesanan dalam proses',
                            'body' => 'Pesanan dalam proses pengiriman dari rantus',
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
                            'title' => 'Pesanan dalam proses',
                            'body' => 'Pesanan dalam proses pengiriman dari rantus',
                            "click_action"=> "FLUTTER_NOTIFICATION_CLICK"
                        ])
                        ->send();
                    break;

                case 4:
                
                    $Rantus = Rantuss::join('koruses','koruses.no_rantus','=','rantusses.no_rantus')->join('users','users.id','=','rantusses.id_user')
                    ->where('koruses.no_korus',$pemesan->kode_korus)->value('fcm_token_mitra');
            
                    $recipients_mitra=[
                        $Rantus
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
                            'title' => 'Pesanan dalam proses',
                            'body' => 'Pesanan telah terkirim ke korus',
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
                            'title' => 'Pesanan dalam proses',
                            'body' => 'Pesanan telah terkirim ke korus',
                            "click_action"=> "FLUTTER_NOTIFICATION_CLICK"
                        ])
                        ->send();
                    break;

                case 5:
                
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
                            'title' => 'Pesanan dalam proses',
                            'body' => 'Pesanan telah diterima Anggota',
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
                            'title' => 'Pesanan dalam proses',
                            'body' => 'Pesanan telah diterima Anggota',
                            "click_action"=> "FLUTTER_NOTIFICATION_CLICK"
                        ])
                        ->send();
                    break;

                case 6:
                
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
                            'title' => 'Pesanan dalam proses',
                            'body' => 'Pembayaran Selesai',
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
                            'title' => 'Pesanan dalam proses',
                            'body' => 'Pembayaran Selesai',
                            "click_action"=> "FLUTTER_NOTIFICATION_CLICK"
                        ])
                        ->send();
                    break;
                
                case 7:
                
                    $notif_mitra = "tidak ada notif";
                    $notif_ecommerce = "tidak ada notif";
                    break;
                case 8:

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
                    break;
                  case 9:

                    $recipients_ecommerce=[
                        $pemesan->fcm_token_ecommerce  
                    ];
                    $notif_mitra = null;
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
                            'title' => 'Status Pesanan',
                            'body' => 'Pesanan anda telah dibatalkan',
                            "click_action"=> "FLUTTER_NOTIFICATION_CLICK"
                        ])
                        ->send();
                      break;
                default:
                    return response()->json([
                        'success' => false,
                        'message' => 'status pesanan Melebihi batas'
                        ]);
                    break; 
              } 

            return response()->json([
            'success' => true,
            'message' => 'status pesanan terlah dirubah',
            'notif_mitra' => $notif_mitra,
            'notif_ecommerce' => $notif_ecommerce,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'pesanan tidak ada'
                ]);
        }
       
    }


    public function getPesananbyStatus(request $request, $id){
        $pesan = Pesanan::where('id_user',$id)->get();
        if(count($pesan) > 0){
            if($request->status == "menunggu_konfirmasi"){
                $pesanan = Pesanan::where('id_user',$id)->
                                where('status_pesanan' , 0)->get();

                return response()->json([
                'success' => true,
                'pesanan' => $pesanan
                ]);
            }elseif($request->status == "dalam_proses"){
                $pesanan = Pesanan::where('id_user',$id)->
                                whereIn('status_pesanan' , [1,2,3,4] )->get();

                return response()->json([
                'success' => true,
                'pesanan' => $pesanan
                ]);
            }elseif($request->status == "terkirim"){
                $pesanan = Pesanan::where('id_user',$id)->
                                whereIn('status_pesanan' , [5,6,7] )->get();

                return response()->json([
                'success' => true,
                'pesanan' => $pesanan
                ]);
            }else{
                $pesanan = Pesanan::where('id_user',$id)->
                                where('status_pesanan' , 8 )->get();

                return response()->json([
                'success' => true,
                'pesanan' => $pesanan
                ]);
            }   
        }else{
            return response()->json([
                'success' => false,
                'message' => 'pesanan tidak ada'
                ]);
        } 
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\User;
use App\Korus;
use App\Rantuss;
use App\Produks;

class testController extends Controller
{
    public function testdata(request $request,$id){
        // $pesanan = Pesanan::find($id);
        // if($pesanan){
        //     $pemesan = User::find($pesanan->id_user);
        //     if($pemesan){
        //         $Rantus = Rantuss::join('koruses','koruses.no_rantus','=','rantusses.no_rantus')->join('users','users.id','=','rantusses.id_user')
        //                 ->where('koruses.no_korus',$pemesan->kode_korus)->value('fcm_token_mitra');

        //         $recipients =[
        //             "fwWjWt0QRQqiKqW9y40aT2:APA91bGp7cXcx1kFqIuUDVbEEGZCa4_t-SFKgq7_GqhfRVt7-wgCsVHUrI_G-5xFztgFrpMiAbFLO_xl5aLCjKC2XqDHV90LOEcRX2fQOgezhEMFYcDz-D1DdW8cqCHqZF5mVFA16a_J",
        //             "dowB1bHPS96NfJKOV0D-0N:APA91bH1f9hIgBlg4ej2669J-tWdYgCq06ppVEDVeVKo4MiBP8ojQClBHe9d6nj1HxPKa7OGX5l58nfmKT-Hrlqj4p7Vq0TYBE3KmQrzE4p9jcULQ_7RkR1BoQbYyRtWXBkef0g65pr9"  
        //         ];
                
        //         $notif= fcm()
        //                 ->to($recipients) // $recipients must an array
        //                 ->priority('normal')
        //                 ->timeToLive(0)
        //                 ->data([
        //                     'name' => $pemesan->name,
        //                     'id_user' => $pemesan->id,
        //                     'id_pesanan' => $pesanan->id,
        //                 ])
        //                 ->notification([
        //                     'title' => 'Test Notif',
        //                     'body' => 'Test test',
        //                     "click_action"=> "FLUTTER_NOTIFICATION_CLICK"
        //                 ])
        //                 ->send();

        //         return response()->json([
        //             'pemesan' => $pesanan,
        //             'penerima' => $recipients,
        //             'notif' => $notif
        //         ]);
        //     }else{
        //         return response()->json([
        //         'success' => false,
        //         'message' => 'user tidak ada',
        //         ]);
        //     }
        // }else{
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'pesanan tidak ada',
        //     ]);
        // }
        $produk = Produks::find(1);
        foreach(json_decode($produk->image) as $kontol){
            $data[]= $kontol;
        }
        
        foreach($request->image as $images){
            $data []= $images->getClientOriginalName();
        }
         
        $produk->image = json_encode($data);

        $produk->save();
        return response()->json([
                 $produk->image
             ]);
        
     }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FCM extends Controller
{
    //

    public function __construct() {
        $this->middleware('auth:api');
    }

    public function saveTokenEcom(request $request){
        $id = auth()->user()->id;
        if($request->token!= auth()->user()->fcm_token){
            $user = User::find($id);
            $user->fcm_token_ecommerce = $request->token;
            $user->save();
            return response()->json([
                'message' => 'Token Baru berhasil di input',
                'token' => $request->token,
            ]);
        }
        else{
            return response()->json([
                'message' => 'Token Tetap',
                'token' => $request->token,
            ]);
        }
    }

    public function saveTokenMitra(request $request){
        $id = auth()->user()->id;
        if($request->token!= auth()->user()->fcm_token){
            $user = User::find($id);
            $user->fcm_token_mitra = $request->token;
            $user->save();
            return response()->json([
                'message' => 'Token Baru berhasil di input',
                'token' => $request->token,
            ]);
        }
        else{
            return response()->json([
                'message' => 'Token Tetap',
                'token' => $request->token,
            ]);
        }
    }
}

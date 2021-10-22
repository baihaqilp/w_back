<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use Carbon\Carbon;
class BeritaController extends Controller
{
    //
    // public function _construct(){
    //     $this->middleware('auth:api');
    // }

    public function index(){
        $berita = Berita::orderBy('created_at','desc')->paginate(6);
        return response()->json([
            'success' => true,
            'message' => "Success",
            'berita' => $berita,
        ]);
    }


    public function getDetail(request $request,$id){
        $berita = Berita::find($id);

        return response()->json([
            'success' => true,
            'message' => "Success",
            'berita' => $berita,
        ]);
    }
}

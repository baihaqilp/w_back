<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ongkirs;
class OngkirsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }


    public function getByAlamat(request $request, $id_daerah){
        $ongkir = Ongkirs::where('id_daerah',$id_daerah)->get('biaya_admin_final');

        return response()->json([
            'success' => true,
            'ongkir' => $ongkir,
        ]);
    }
}

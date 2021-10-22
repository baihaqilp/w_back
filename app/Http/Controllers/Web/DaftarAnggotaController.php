<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DaftarAnggotaController extends Controller
{
    public function index(){

        // $data = User::join()
        return view('daftar_anggota');
    }
}

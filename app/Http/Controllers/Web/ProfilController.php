<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Anggotas;

class ProfilController extends Controller
{
    public function index(){
        return view('profil');
    }
}

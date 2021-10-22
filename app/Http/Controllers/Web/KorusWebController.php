<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class KorusWebController extends Controller
{
    public function index(){
        return view('eccomerce/Korus');
    }
}

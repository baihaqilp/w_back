<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RantusWebController extends Controller
{
    public function index(){
        return view('eccomerce/Rantus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotasController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth:api');
    }
}

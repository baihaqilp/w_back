<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    //
    public function index(){
        $banner = Banner::orderBy('created_at','desc')->get();
        return response()->json([
            'success' => true,
            'message' => "Success",
            'banner' => $banner,
        ]);
    }

}

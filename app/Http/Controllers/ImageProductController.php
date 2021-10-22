<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produks;

class ImageProductController extends Controller
{
    //
    public function getProductImage($id_produk){
        $product_image = Produks::find($id_produk)->fileProduct;
        return response()->json([
            'success' => true,
            'file' => $product_image
        ]);
    }
}

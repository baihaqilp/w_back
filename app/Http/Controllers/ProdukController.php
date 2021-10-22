<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Produks;
use App\ImageProduct;

class ProdukController extends Controller
{


    // public function __construct() {
    //     $this->middleware('auth:api');
    // }
   
    public function index(){
        $product = Produks::where('visibilitas',true)->paginate(6);
        
        return response()->json([
            'success' => true,
            'produk' => $product]);
    }

    public function create(request $request)
    {
        # code...
        $product = new Produks;
        $product->id_kategori = $request->id_kategori;
        $product->judul_produk = $request->judul_produk;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->jumlah_penyajian = $request->jumlah_penyajian;
        $product->alamat = $request->alamat;
        $product->image = $request->image;
        
        if ($product->save())
            return response()->json([
                'success' => true,
                'produk' => $product
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, produk could not be added'
            ], 500);
    }

    public function update(request $request, $id)
    {
        # code...
        
        $id_kategori = $request->id_kategori;
        $judul_produk = $request->judul_produk;
        $harga = $request->harga;
        $deskripsi = $request->deskripsi;




        $product = Produks::find($id);
        $product->id_kategori = $id_kategori;
        $product->judul_produk = $judul_produk;
        $product->harga = $harga;
        $product->deskripsi = $deskripsi;
        if ($product->save())
            return response()->json([
                'success' => true,
                'produk' => $product
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, produk could not be Updated'
            ], 500);
    }
 
    public function delete(request $request, $id)
    {
        # code...
        
        $product = Produks::find($id);
        $product->delete();

        return "Data Deleted";
    }


    public function getbyCategory(request $request,$id_kategori){
            $produk= Produks::where('id_kategori',$id_kategori)->paginate(6);
            return response()->json([
                'success' => true,
                'produk' => $produk,
            ]);
    }

    public function getbyId(request $request, $id){
        $produk = Produks::find($id);
        return response()->json([
            'success' => true,
            'produk' => $produk, ]);
    }

    public function search($key){
        $data = Produks::where('nama_produk','ILIKE','%'.$key.'%')->paginate(6);

        if (is_null($data)) {   
            return response()->json([
                    'success' => false,
                    'code' => '404',
                    'message' => 'produk tidak ditemukan'
            ]);
    }

    return response()->json([
        'success'  => true,
        'produk' => $data,
    ]);
    }

}

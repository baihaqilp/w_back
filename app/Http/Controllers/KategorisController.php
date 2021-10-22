<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategoris;

class KategorisController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth:api');
    // }
    public function index(){
        $kategoris = Kategoris::rightJoin('produks','produks.id_kategori','=','kategoris.id')->where('produks.visibilitas',true)->select('kategoris.*')
                                ->groupBy('kategoris.id')->orderBy('kategoris.id','asc')->get();
        return response()->json([
            'success' => true,
            'kategoris' => $kategoris
        ]);
    }

    public function create(request $request)
    {
        # code...
        $kategoris = new Kategoris;
        $kategoris->nama_kategori = $request->nama_kategori;
        $kategoris->kategori_induk = $request->kategori_induk;
        $kategoris->urutan = $request->urutan;
        $kategoris->visibilitas = $request->visibilitas;
        $kategoris->tampil = $request->tampil;
        $kategoris->image = $request0->image;
        
        if ($kategoris->save())
            return response()->json([
                'success' => true,
                'kategoris' => $kategoris
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, kategoris could not be added'
            ], 500);
    }

    public function update(request $request, $id)
    {
        # code...
        
        $nama_kategori = $request->nama_kategori;
        $kategori_induk = $request->kategori_induk;
        $urutan = $request->urutan;
        $visibilitas = $request->visibilitas;
        $tampil = $request->tampil;




        $kategoris = Kategoris::find($id);
        $kategoris->nama_kategori = $nama_kategori;
        $kategoris->kategori_induk = $kategori_induk;
        $kategoris->urutan = $urutan;
        $kategoris->visibilitas = $visibilitas;
        $kategoris->tampil = $tampil;
        if ($kategoris->save())
            return response()->json([
                'success' => true,
                'kategoris' => $kategoris
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, kategoris could not be Updated'
            ], 500);
    }
 
    public function delete(request $request, $id)
    {
        # code...
        
        $kategoris = Kategoris::find($id);
        $kategoris->delete();

        return "Data Deleted";
    }

    
}

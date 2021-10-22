<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KategoriInduk;
class KategoriIndukController extends Controller
{
    public function index()
    {
        $induks = KategoriInduk::all();
        return view('eccomerce/KategoriInduk',['induks'=>$induks]);
    }
    public function input_kategoriinduk(request $request)
    {
        $induks = new KategoriInduk;
        $induks->kategori_induk = $request->kategori_induk;
        $induks->save();   
                return redirect()->route('kategori.induk')
                             ->with('success','kategori Berhasl Ditambahkan');
    }
    public function view_update_kategori_induk(request $request,$id){
        $induks = KategoriInduk::find($id);
        return view('eccomerce/EditKategoriInduk',['induks'=>$induks]);
    }
    public function hapus_kategori_induk(request $request, $id)
    {
        # code...
        
        $induks = KategoriInduk::find($id);
        $induks->delete();

        return redirect()->route('kategori.induk')
                             ->with('danger','kategori Berhasl Dihapus');
    }
    public function update_kategori_induk(request $request, $id)
    {
        
        $kategori_induk = $request->kategori_induk;

        $induks = KategoriInduk::where('id',$id)->update([
            'kategori_induk' => $kategori_induk,
        ]);
        return redirect()->route('kategori.induk')
                             ->with('success','kategori Berhasl Di Edit');
    }
}

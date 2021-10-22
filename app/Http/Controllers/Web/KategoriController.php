<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Kategoris;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Storeage;
use App\KategoriInduk;
class KategoriController extends Controller
{
    public function index(Request $request){
        $kategoris = Kategoris::all();
        $induks = KategoriInduk::all();
        return view('eccomerce/kategori',['kategoris' => $kategoris,'induks'=>$induks]);
    }

    public function create(request $request)
    {
    
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'image' => 'mimes:jpeg,png,jpg|max:10240',
                ]);
                $kategoris = new Kategoris;
                $kategoris->nama_kategori = $request->nama_kategori;
                $kategoris->kategori_induk = $request->kategori_induk;
                $kategoris->urutan = $request->urutan;
                $kategoris->visibilitas = $request->visibilitas;
                $kategoris->tampil = $request->tampil;
                $image_name = date("h:i:s").preg_replace('/\s+/', '', $request->file('image')->getClientOriginalName());
                Storage::disk('kategori')->putFileAs('/',$request->file('image'),$image_name); 
                $kategoris->image = $image_name;
                $kategoris->save();   
                return redirect()->route('kategori.eccommerce')
                             ->with('success','kategori Berhasl Ditambahkan');
            }
        }
        abort(500, 'Could not upload image :(');
                
    }
    public function view_update_kategori(request $request,$id){
        $kategoris = Kategoris::find($id);
        return view('eccomerce/EditKategori',['kategoris'=>$kategoris]);
    }
    public function hapus_kategori(request $request, $id)
    {
        # code...
        
        $kategoris = Kategoris::find($id);
        $kategoris->delete();

        return redirect()->route('kategori.eccommerce')
                             ->with('danger','kategori Berhasl Dihapus');
    }
    public function update_kategori(request $request, $id)
    {
        if($request->hasFile('image')){
            $image_name = date("h:i:s").preg_replace('/\s+/', '', $request->file('image')->getClientOriginalName());
            Storage::disk('kategori')->putFileAs('/',$request->file('image'),$image_name); 
        }else{
            $kategori = Kategoris::find($id);
            $image_name = $kategori->image;
        }
        $nama_kategori = $request->nama_kategori;
        $kategori_induk = $request->kategori_induk;
        $urutan = $request->urutan;
        $visibilitas = $request->visibilitas;
        $tampil = $request->tampil;
       
        $image = $image_name;

        $kategoris = Kategoris::where('id',$id)->update([
            'nama_kategori' => $nama_kategori,
            'kategori_induk' => $kategori_induk,
            'urutan' => $urutan,
            'visibilitas' => $visibilitas,
            'tampil' => $tampil,
            'image' => $image,
        ]);
        return redirect()->route('kategori.eccommerce')
                             ->with('success','kategori Berhasl Di Edit');
    }

    public function image($fileName){
        $path = public_path().'/img/kategori/'.$fileName;
        return response()->download($path);        
    }
}

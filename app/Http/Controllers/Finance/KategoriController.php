<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Kategoris;
use App\KategoriFinances;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Storeage;
class KategoriController extends Controller
{
    public function index(Request $request){
        $kategoris = KategoriFinances::all();
        return view('finance/kategori',['kategoris' => $kategoris]);
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
                $kategoris = new KategoriFinances;
                $kategoris->nama_kategori = $request->nama_kategori;
                $kategoris->kategori_induk = $request->kategori_induk;
                $kategoris->urutan = $request->urutan;
                $kategoris->visibilitas = $request->visibilitas;
                $kategoris->tampil = $request->tampil;
                $image_name = date("h:i:s").preg_replace('/\s+/', '', $request->file('image')->getClientOriginalName());
                Storage::disk('kategori')->putFileAs('/',$request->file('image'),$image_name); 
                $kategoris->image = $image_name;
                $kategoris->save();   
                return redirect()->route('kategori.finance')
                             ->with('success','kategori Berhasl Ditambahkan');
            }
        }
        abort(500, 'Could not upload image :(');
                
    }
    public function view_update_kategori(request $request,$id){
        $kategoris = Kategoris::find($id);
        return view('finance/EditKategori',['kategoris'=>$kategoris]);
    }
    public function hapus_kategori(request $request, $id)
    {
        # code...
        
        $kategoris = KategoriFinances::find($id);
        $kategoris->delete();

        return redirect()->route('kategori.finance')
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
        return redirect()->route('kategori.finance')
                             ->with('success','kategori Berhasl Di Edit');
    }

    public function image($fileName){
        $path = public_path().'/img/kategori/'.$fileName;
        return response()->download($path);        
    }
}

<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Beritas;
class BeritaController extends Controller
{
    public function _construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        $query=Beritas::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(beritas.created_at) >= '" . $tanggal_awal . "' AND date(beritas.created_at) <= '" . $tanggal_akhir . "'");
           }
        $beritas = $query->select('beritas.*')->orderBy('id','ASC')->get();
        return view('eccomerce/berita',['beritas'=>$beritas]);
    }
    public function form_berita(){
        return view('eccomerce/tambah_berita');
    }
    public function tambah_berita(request $request){
        if ($request->hasFile('gambar_berita')) {
            //  Let's do everything here
            if ($request->file('gambar_berita')->isValid()) {
                //
                $validated = $request->validate([
                    'gambar_berita' => 'mimes:jpeg,png,jpg|max:10240',
                ]);
                $beritas = new Beritas;
                $beritas->judul_berita = $request->judul_berita;
                $beritas->isi = $request->isi;
                $beritas->link = $request->link;
                $beritas->tanggal_berita = $request->tanggal_berita;
                $gambar_berita = date("h:i:s").preg_replace('/\s+/', '', $request->file('gambar_berita')->getClientOriginalName());
                Storage::disk('berita')->putFileAs('/',$request->file('gambar_berita'),$gambar_berita); 
                $beritas->gambar_berita = $gambar_berita;
                $beritas->save();   
                return redirect()->route('berita.show')
                             ->with('success','berita Berhasl Ditambahkan');
            }
        }
        abort(500, 'Could not upload image :(');
    }
    public function hapus(request $request,$id){
        $beritas = Beritas::find($id);
        $beritas->delete();

        return redirect()->route('berita.show')
                            ->with('danger','Berhasil Menghapus Berita');
    }
    public function view_update_berita(request $request, $id){
        $beritas = Beritas::find($id);
        return view('eccomerce/EditBerita',['beritas'=>$beritas]);
    }
}

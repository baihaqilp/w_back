<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ongkirs;
use App\Kategoris;
use App\Desas;

class OngkirController extends Controller
{
    //

    public function index(Request $request){
        $query=Ongkirs::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(ongkirs.created_at) >= '" . $tanggal_awal . "' AND date(ongkirs.created_at) <= '" . $tanggal_akhir . "'");
           }
        $ongkir = $query->select('ongkirs.*')->orderBy('id','ASC')->latest()->get();
        return view('finance/Ongkir',['ongkir' => $ongkir]);
    } 
    public function view_ongkir(){
        $daerah = Desas::all();
        return view('finance/TambahOngkir',['daerah'=>$daerah]);
    }
    public function view_edit_ongkir(Request $request,$id){
        $desa = Desas::all();
        $ongkirs = Ongkirs::find($id);
        return view('finance/EditOngkir',['ongkirs'=>$ongkirs,
            'desa' => $desa
        ]);
    }
    public function input_ongkir(request $request)
    {
        # code...
        $daerah = Desas::where('kode_desa',$request->id_daerah)->value('desa');
        $ongkirs = new Ongkirs;
        $ongkirs->id_daerah= $request->id_daerah;
        $ongkirs->nama_daerah = $daerah;
        $ongkirs->gudang = $request->gudang;
        $ongkirs->jarak_km = $request->jarak_km;
        $ongkirs->biaya_admin = $request->biaya_admin;
        $ongkirs->biaya_distribusi = $request->biaya_distribusi;
        $ongkirs->biaya_admin_final = $request->biaya_admin_final;
        $ongkirs->save();
        return redirect()->route('ongkir.finance')
        ->with('success','Berhasil di tambahkan');
       
    }
    public function update_ongkir(request $request, $id)
    {
        $daerah = Desas::where('kode_desa',$request->id_daerah)->value('desa');
        $id_daerah= $request->id_daerah;
        $nama_daerah = $daerah;
        $gudang = $request->gudang;
        $jarak_km = $request->jarak_km;
        $biaya_admin = $request->biaya_admin;
        $biaya_distribusi = $request->biaya_distribusi;
        $biaya_admin_final = $request->biaya_admin_final;
       
        $ongkirs = Ongkirs::where('id',$id)->update([
            'id_daerah' => $id_daerah,
            'nama_daerah' =>$nama_daerah ,
            'gudang' =>$gudang,
            'jarak_km' =>$jarak_km ,
            'biaya_admin' =>$biaya_admin,
            'biaya_distribusi' =>$biaya_distribusi,
            'biaya_admin_final' =>$biaya_admin_final,
            'pembulatan' =>$pembulatan,
        ]);
        return redirect()->route('ongkir.finance')
        ->with('success','Berhasil Mengedit Ongkir');
    }
 
    public function delete_ongkir(request $request, $id)
    {
        # code...
        
        $ongkirs = Ongkirs::find($id);
        $ongkirs->delete();

        return redirect()->route('ongkir.finance')
        ->with('success','Berhasil di Hapus');
    }
}

<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;




class MitraController extends Controller
{
    public function index(Request $request){
        $query=Investor::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(investors.created_at) >= '" . $tanggal_awal . "' AND date(investors.created_at) <= '" . $tanggal_akhir . "'");
           }
        $mitras = $query->select('investors.*')->orderBy('id','ASC')->get();
        return view('eccomerce/mitra',['mitras' => $mitras]);
        //$mitras = Investor::all();
        //return view('eccomerce/mitra',['mitras'=>$mitras]);
    }
    public function view_tambah_mitra(){
        return view('eccomerce/TambahMitra');
    }
    public function view_update_mitra(Request $request,$id){
        $mitras = Investor::find($id);
        return view('eccomerce/EditMitra',['mitras'=>$mitras]);
    }
    public function view_detail_mitra(Request $request,$id){
        $mitras = Investor::find($id);
        return view('eccomerce/DetailMitra',['mitras'=>$mitras]);
    }
    public function input_mitra(Request $request){
        if($request->hasFile('foto'))
        {
            if($request->file('foto')->isValid())
            {
                $validated = $request->validate([
                    'foto' => 'mimes:jpeg,png,jpg|max:10240',
                ]);
            }
        $mitras = new Investor;
        $mitras->username = $request->username;
        $mitras->name = $request->name;
        $mitras->email=$request->email;
        $mitras->password = Hash::make($request->password);
        $foto = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto')->getClientOriginalName());
            Storage::disk('foto_user')->putFileAs('/',$request->file('foto'),$foto);
        $mitras->foto = $foto;
        

        $mitras->save();
            return redirect()->route('mitra.show')
                            ->with('success','Berhasil Menambahkan Mitra');
            }
    }
    public function delete_mitra(Request $request,$id){
        $mitras = Investor::find($id);
        $mitras->delete();
        
            return redirect()->route('mitra.show')
                            ->with('success','Berhasil Menghapus Mitra');
            }
    public function update_mitra(Request $request,$id){
        if($request->hasFile('foto')){
            $foto = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto')->getClientOriginalName());
            Storage::disk('foto_user')->putFileAs('/',$request->file('foto'),$foto);
        }else{
            $mitras = Investor::find($id);
            $foto = $mitras->foto;
        }
        $username = $request->username;
        $name = $request->name;
        $email=$request->email;
        $password = $request->password;

        $mitras = Investor::where('id',$id)->update([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' =>$password,
            'foto'=>$foto,
        ]);
        return redirect()->route('mitra.show')
        ->with('success','Berhasil Mengedit Mitra');
    }

}

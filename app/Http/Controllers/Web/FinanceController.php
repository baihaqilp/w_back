<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Finances;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class FinanceController extends Controller
{
    public function index(Request $request){
        $query=Finances::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(finances.created_at) >= '" . $tanggal_awal . "' AND date(finances.created_at) <= '" . $tanggal_akhir . "'");
           }
        $finances = $query->select('finances.*')->orderBy('id','ASC')->get();
        return view('eccomerce/finance',['finances' => $finances]);
        //$mitras = Investor::all();
        //return view('eccomerce/mitra',['mitras'=>$mitras]);
    }
    public function view_tambah_finance(){
        return view('eccomerce/TambahFinance');
    }
    public function input_finance(Request $request){
        if($request->hasFile('foto'))
        {
            if($request->file('foto')->isValid())
            {
                $validated = $request->validate([
                    'foto' => 'mimes:jpeg,png,jpg|max:10240',
                ]);
            }
        $finances = new Finances;
        $finances->username = $request->username;
        $finances->name = $request->name;
        $finances->email=$request->email;
        $finances->password = Hash::make($request->password);
        $foto = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto')->getClientOriginalName());
            Storage::disk('foto_user')->putFileAs('/',$request->file('foto'),$foto);
        $finances->foto = $foto;
        

        $finances->save();
            return redirect()->route('finance.show')
                            ->with('success','Berhasil Menambahkan Finance');
            }
    }
    public function view_detail_finance(Request $request,$id){
        $finance = Finances::find($id);
        return view('eccomerce/DetailFinance',['finances'=>$finance]);
    }
    public function view_update_finance(Request $request,$id){
        $finance = Finances::find($id);
        return view('eccomerce/EditFinance',['finances'=>$finance]);
    }
    public function update_finance(Request $request,$id){
        if($request->hasFile('foto')){
            $foto = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto')->getClientOriginalName());
            Storage::disk('foto_user')->putFileAs('/',$request->file('foto'),$foto);
        }else{
            $finances = Finances::find($id);
            $foto = $finances->foto;
        }
        $username = $request->username;
        $name = $request->name;
        $email=$request->email;
        $password = $request->password;

        $finances = Finances::where('id',$id)->update([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' =>$password,
            'foto'=>$foto,
        ]);
        return redirect()->route('finance.show')
        ->with('success','Berhasil Mengedit Finance');
    }
    public function delete_finance(Request $request,$id){
        $finances = Finances::find($id);
        $finances->delete();
        
            return redirect()->route('finance.show')
                            ->with('success','Berhasil Menghapus Finance');
            }
}

<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query=Admin::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(admins.created_at) >= '" . $tanggal_awal . "' AND date(admins.created_at) <= '" . $tanggal_akhir . "'");
           }
        $admins = $query->select('admins.*')->orderBy('id','ASC')->get();
        return view('finance/admin',['admins' => $admins]);
        //$admins = Admin::all();
       // return view('eccomerce/admin',['admins'=>$admins]);
    }
    public function view_detail_user(request $request,$id){
        $admins = Admin::find($id);
        return view('finance/DetailAdmin',['admins'=>$admins]);
    }
    public function view_tambah_admin()
    {
        return view('finance/TambahAdmin');
    }
    public function view_update_admin(request $request,$id){
        $admins = Admin::find($id);
        //$admins = Crypt::decrypt($admins['password']);
        return view('finance/EditAdmin',['admins'=>$admins]);
    }
    public function input_admin(Request $request){
        if($request->hasFile('foto'))
        {
            if($request->file('foto')->isValid())
            {
                $validated = $request->validate([
                    'foto' => 'mimes:jpeg,png,jpg|max:10240',
                ]);
            }
        $admins = new Admin;
        $admins->username = $request->username;
        $admins->name = $request->name;
        $admins->email=$request->email;
        $admins->password = Hash::make($request->password);
        $foto = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto')->getClientOriginalName());
            Storage::disk('foto_user')->putFileAs('/',$request->file('foto'),$foto);
        $admins->foto = $foto;
        $admins->is_super = true;

        $admins->save();
            return redirect()->route('finance.admin')
                            ->with('success','Berhasil Menambahkan User Admin');
            }
    }
    public function update_admin(Request $request,$id){
        if($request->hasFile('foto')){
            $foto = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto')->getClientOriginalName());
            Storage::disk('foto_user')->putFileAs('/',$request->file('foto'),$foto);
        }else{
            $admins = Admin::find($id);
            $foto = $produk->foto;
        }
        $username = $request->username;
        $name = $request->name;
        $email=$request->email;
        $password = $request->password;
        $is_super = true;

        $admins = Admin::where('id',$id)->update([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' =>$password,
            'is_super' =>$is_super,
            'foto'=>$foto,
        ]);
        return redirect()->route('finance.admin')
        ->with('success','Berhasil Mengedit User Admin');
    }
    public function delete_admin(Request $request,$id){
        $admins = Admin::find($id);
        $admins->delete();
        
            return redirect()->route('finance.admin')
                            ->with('success','Berhasil Menghapus User Admin');
            }
    }

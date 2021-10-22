<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\DaftarAnggotas;
use App\Rantuss;
use App\Kecamatans;
use App\Desas;
use App\Korus;
use App\Kotas;
class AnggotaController extends Controller
{
    //
    public function _construct(){
        $this->middleware('auth:admin');
    }
    public function index(Request $request){
        $query=User::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(users.created_at) >= '" . $tanggal_awal . "' AND date(users.created_at) <= '" . $tanggal_akhir . "'");
           }
        $anggota = $query->orderBy('id','ASC')->get();
        
        return view('finance/anggota',['anggota'=>$anggota]);
        //$anggota = User::join('anggotas','anggotas.id_user','=','users.id')->select('users.*','anggotas.no_anggota_koperasi')->where('is_anggota',true)->orderBy('id','ASC')->get();
        // $anggota = User::orderBy('id','ASC')->get();
        //return view('eccomerce/anggota',['anggota' => $anggota]);
    }

    public function index_investor(){
        $anggota = User::orderBy('id','ASC')->get();
        return view('eccomerce/anggota',['anggota' => $anggota]);
    }


    public function store(Request $request){
        request()->validate([
            'email' => 'required|email|unique',
            'phone' => 'required|unique',
            'name' => 'required|string|max:100',
            'jenis|kelamin' => 'required|string',
            'password' =>'required|min:8',
        ]);
        $no = count(User::all());
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->name;
        $user->phone = $request->name;
        $user->jenis_kelamin = $request->name;
        $user->No_anggota_umum = 'U.'.$request->kota.'.'.str_pad($no+1,5,"0", STR_PAD_LEFT);
        $user->kode_korus = $request->name;
        $user->password = Hash::make($request->password);
        $user->is_anggota = $request->name;
        $user->is_korus = $request->name;
        $user->is_rantus = $request->name;
        $user->is_accepted = $request->name;


    }


    public function getProfilAnggota(request $request,$id){
        $anggota = User::fing($id);
        
        return view('userprofile');
    }
    public function input_anggota(request $request){
        if($request->hasFile('foto_ktp'))
        {
            if($request->file('foto_ktp')->isValid())
            {
                $validated = $request->validate([
                    'foto_ktp' => 'mimes:jpeg,png,jpg|max:10240',
                ]);
            }
            $daftar = new DaftarAnggotas;
            $foto_ktp = date("h:i:s")."_".$request->file('foto_ktp')->getClientOriginalName();
            Storage::disk('foto_ktp')->putFileAs('/',$request->file('foto_ktp'),$foto_ktp);
            $daftar->foto_ktp = $foto_ktp;
            $daftar->nama_lengkap = $request->nama_lengkap;
            $daftar->tempat_lahir = $request->tempat_lahir ;
            $daftar->tanggal_lahir = $request->tanggal_lahir;
            $daftar->no_ktp = $request->no_ktp;
            $daftar->no_kk = $request->no_kk;
            $daftar->alamat = $request->alamat;
            $daftar->jenis_kelamin = $request->jenis_kelamin;
            $daftar->no_hp = $request->no_hp;
           
            
            $daftar->save();
            return redirect()->route('daftar.anggota')
                            ->with('success','Terimakasih telah mendaftar');
            }
            abort(500, 'Could not upload image :(');
        
    }
    public function view_tambah_anggota()
    {
        return view('finance/TambahAnggota');
    }

    public function angkat_korus(request $request,$id){
        $validatedData = $request->validate([
            'rantus' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required'
        ]);
        
        $area = $request->desa.','.$request->kecamatan;
        
        $no = count(User::join('addresses','addresses.user_id','users.id')->where('is_korus',true)
                    ->where('desa',$request->desa)->get());
        $no_korus = 'K-'.substr($request->desa,0,4).'.'.substr($request->desa,-4,4).'.'.str_pad($no+1,2,"0", STR_PAD_LEFT); 

        $korus = Korus::insert([
            'id_user' => $id,
            'no_korus' => $no_korus,
            'no_rantus' => $request->rantus,
            'area' => $area,
        ]);

        $no_anggota_umum = 'U.'.$request->kota.'.'.str_pad($no,5,"0", STR_PAD_LEFT); 
        $angkat = User::where('id',$id)->update(['is_korus'=>true,'kode_korus' => $no_korus]);
        
        if($angkat){
            return redirect()->route('anggota.finance')->with('success','Pengangkatan Korus Berhasil');
        }
    }
    public function angkat_rantus(request $request,$id){
        $validatedData = $request->validate([
            'kota' => 'required',
            'kecamatan' => 'required'
        ]);
        $kota = Kotas::where('kode_kota',$request->kota)->pluck('kota');
        $kecamatan = Kecamatans::where('kode_kecamatan',$request->kecamatan)->pluck('kecamatan');
        $area = $kecamatan[0].','.$kota[0];
        
        $no = count(User::join('addresses','addresses.user_id','users.id')->where('is_rantus',true)
                    ->where('kecamatan',$request->kecamatan)->get());
        $no_rantus = 'R-'.substr($request->kecamatan,0,4).'.'.substr($request->kecamatan,-2,2).'.'.str_pad($no+1,2,"0", STR_PAD_LEFT); 
        
        $korus = Rantuss::insert([
            'id_user' => $id,
            'no_rantus' => $no_rantus,
            'area' => $area,
        ]);
        $angkat = User::where('id',$id)->update(['is_rantus'=>true]);

        if($angkat){
            return redirect()->route('anggota.finance')->with('success','Pengangkatan Rantus Berhasil');
        }
    }
    public function hapus_korus($id){
        $angkat = User::where('id',$id)->update(['is_korus'=>false]);
        $korus = Korus::where('id_user',$id)->delete();
        if($angkat){
            return redirect()->route('anggota.finance')->with('success','Korus Berhasil dicabut');
        }
    }
    public function hapus_rantus($id){
        $angkat = User::where('id',$id)->update(['is_rantus'=>false]);
        $rantus = Rantuss::where('id_user',$id)->delete();
        if($angkat){
            return redirect()->route('anggota.finance')->with('success','Rantus Berhasil dicabut');
        }
    }

    public function angkat_korusView(request $request, $id){
        $data = User::find($id);
        $rantus = Rantuss::join('users','users.id','=','rantusses.id_user')->select('rantusses.*','users.name')->get();
        $kecamatan = Kecamatans::orderBy('kecamatan','asc')->get();
        return view('finance/Korus',[
            'data' => $data,
            'rantus' => $rantus,
            'kecamatan' =>$kecamatan
        ]);
    }

    public function angkat_rantusView(request $request, $id){
        $data = User::find($id);
        $kota = Kotas::orderBy('kota','asc')->get();
        return view('finance/Rantus',[
            'data' => $data,
            'kota' =>$kota
        ]);
    }

    public function get_desa($kode_kecamatan){
        $desa = Desas::where('kode_kecamatan',$kode_kecamatan)->orderBy('desa','asc')->pluck('desa','kode_desa');

        return json_encode($desa);
    }
    public function get_kecamatan($kode_kota){
        $kecamatan = Kecamatans::where('kode_kota',$kode_kota)->orderBy('kecamatan','asc')->pluck('kecamatan','kode_kecamatan');

        return json_encode($kecamatan);
    }

    
}

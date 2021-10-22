<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\umkms;
use Illuminate\Support\Facades\Storage;

class umkmController extends Controller
{
    public function detail_ukm(Request $request,$id){
        $umkms = umkms::find($id);
        return view('finance/DetailUkm',['umkms'=>$umkms]);
    }
    public function index(){
        return view('umkm/umkm');
    }
    public function view_update_ukm(request $request,$id){
        $umkms = umkms::find($id);
        return view('finance/EditUkm',['umkms'=>$umkms]);
    }
    public function input_umkm(Request $request){
        $umkms = $request->session()->get('umkms');
        return view('umkm/umkm',compact('umkms'));
    }
    public function post_umkm(Request $request){
        $validatedData = $request->validate([
            'nama_usaha' => 'required',
            'bentuk_usaha' => 'required',
            'tahun_usaha' => 'required',
            'tahun_usaha' => 'required',
            'omset' => 'required',
            'bidang_usaha' => 'required',
            'no_telp_usaha' => 'required',
        ]);
        if(empty($request->session()->get('umkms'))) { 
            $umkms = new umkms();
            $umkms->fill($validatedData);
            $request->session()->put('umkms',$umkms);
        }else{
            $umkms = $request->session()->get('umkms');
            $umkms->fill($validatedData);
            $request->session()->put('umkms', $umkms);
        }
        return redirect()->route('umkm2.show');
    }
    public function input_umkm2(Request $request){
        $umkms = $request->session()->get('umkms');
        return view('umkm/umkm_step_2',compact('umkms'));
    }
    public function post_umkm2(Request $request){
        $validatedData = $request->validate([
            'jenis_produk' => 'required',
            'foto_produk' => 'mimes:jpeg,png,jpg|max:10240',
            'bahan_baku' => 'required',
            'kebutuhan_bahan' => 'required',
            'nama_merk' => 'required',
            'deskripsi_produk' => 'required',
            'variasi_produk' => 'required',
            'deskripsi_usaha' => 'required'
        ]);
            if($request->hasFile('foto_produk')){
                $foto_produk = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_produk')->getClientOriginalName());
                Storage::disk('umkm')->putFileAs('/',$request->file('foto_produk'),$foto_produk);
            }else{
                $foto_produk=null;
            }
            $umkms = $request->session()->get('umkms');
            $umkms->fill($validatedData);
            $umkms->foto_produk = $foto_produk;
            $request->session()->put('umkms', $umkms);
        return redirect()->route('umkm3.show');
    }
    public function input_umkm3(Request $request){
        $umkms = $request->session()->get('umkms');
        return view('umkm/umkm_step_3',compact('umkms'));
    }
    public function post_umkm3(Request $request)
    {
        $validatedData = $request->validate([
            'karyawan_tetap_pria' => 'required',
            'karyawan_tidak_tetap_pria' => 'required',
            'karyawan_tetap_wanita' => 'required',
            'karyawan_tidak_tetap_wanita' => 'required',
            'nama_pengurus' => 'required',
            'kontak' => 'required',
            'jabatan' => 'required',
        ]);
            
            $umkms = $request->session()->get('umkms');
            $umkms->fill($validatedData);
            $request->session()->put('umkms', $umkms);
        return redirect()->route('umkm4.show');
    }
    public function input_umkm4(Request $request){
        $umkms = $request->session()->get('umkms');
        return view('umkm/umkm_step_4',compact('umkms'));
    }
    public function post_umkm4(Request $request){
        $validatedData = $request->validate([
            'no_ktp_pj' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'desa' => 'required',
            'kode_pos' => 'required',
            'no_telp_rumah' => 'required',
            'no_hp' => 'required',
            'foto_ktp' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_pj' => 'mimes:jpeg,png,jpg|max:10240',
        ]);
        if($request->hasFile('foto_ktp')){
            $foto_ktp = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_ktp')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_ktp'),$foto_ktp);
        }else{
            $foto_ktp = null;
        }
        if($request->hasFile('foto_pj')){
            $foto_pj = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_pj')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_pj'),$foto_pj);
        }else{
            $foto_pj = null;
        }
        
            $umkms = $request->session()->get('umkms');
            $umkms->fill($validatedData);
            $umkms->foto_ktp = $foto_ktp;
            $umkms->foto_pj = $foto_pj;
            $request->session()->put('umkms', $umkms);
        return redirect()->route('umkm5.show');
    }
    public function input_umkm5(Request $request){
        $umkms = $request->session()->get('umkms');
        return view('umkm/umkm_step_5',compact('umkms'));
    }
    public function post_umkm5(Request $request){
        $validatedData = $request->validate([
            'alamat_usaha_utama' => 'required',
            'provinsi_usaha' => 'required',
            'kota_usaha' => 'required',
            'alamat_usaha_lain' => 'required',
            'alamat_usaha_lain2' => 'required',
        ]);
            
            $umkms = $request->session()->get('umkms');
            $umkms->fill($validatedData);
            $request->session()->put('umkms', $umkms);
        return redirect()->route('umkm6.show');
    }
    public function input_umkm6(Request $request){
        $umkms = $request->session()->get('umkms');
        return view('umkm/umkm_step_6',compact('umkms'));
    }
    public function post_umkm6(Request $request){
        $validatedData = $request->validate([
            'iumk' => 'max:255',
            'sku' => 'max:255',
            'izin_usaha_industri' => 'max:255',
            'surat_ijin' => 'max:255',
            'npwp_pemilik' => 'max:255',
            'npwp_bu' => 'max:255',
            'sk_usaha' => 'max:255',
            'tdup' => 'max:255',
            'akta_usaha' => 'max:255',
            'imb' => 'max:255',
            'tanpaberkas'=> 'max:255',
            'foto_iumk' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_sku' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_izin_usaha_industri' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_surat_ijin' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_npwp_pemilik' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_npwp_bu' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_sk_usaha' => 'strmimes:jpeg,png,jpg|max:10240ing',
            'foto_tdup' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_akta_usaha' => 'mimes:jpeg,png,jpg|max:10240',
            'pirt' => 'max:255',
            'sh' => 'max:255',
            'sni' => 'max:255',
            'izin_alat_kesehatan'=> 'max:255',
            'pkrt' =>'max:255',
            'iso'=>'max:255',
            'keamanan' =>'max:255',
            'halal'=>    'max:255',
            'bpom'=>'max:255',
            'sertifikat_khusus_pangan'=>'max:255',
            'sertifikat_non_pangan'=>'max:255',
            'tanpa_sertifikat'=>'max:255',
            'foto_pirt' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_sh' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_sni' => 'mimes:jpeg,png,jpg|max:10240',
            'foto_izin_alat_kesehatan'=> 'mimes:jpeg,png,jpg|max:10240',
            'foto_pkrt' =>'mimes:jpeg,png,jpg|max:10240',
            'foto_iso'=>'mimes:jpeg,png,jpg|max:10240',
            'foto_keamanan' =>'mimes:jpeg,png,jpg|max:10240',
            'foto_halal'=>    'mimes:jpeg,png,jpg|max:10240',
            'foto_bpom'=>'mimes:jpeg,png,jpg|max:10240',
            'foto_sertifikat_khusus_pangan'=>'mimes:jpeg,png,jpg|max:10240',
            'foto_sertifikat_non_pangan'=>'mimes:jpeg,png,jpg|max:10240',
        ]);
        if($request->hasFile('foto_iumk')){
            $foto_iumk = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_iumk')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_iumk'),$foto_iumk);
        }else{
            $foto_iumk = null;
        }
        if($request->hasFile('foto_sku')){
            $foto_sku = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sku')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sku'),$foto_sku);
        }else{
            $foto_sku=null;
        }
        if($request->hasFile('foto_izin_usaha_industri')){
            $foto_izin_usaha_industri = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_izin_usaha_industri')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_izin_usaha_industri'),$foto_izin_usaha_industri);
        }else{
            $foto_izin_usaha_industri=null;
        }
        if($request->hasFile('foto_surat_ijin')){
            $foto_surat_ijin = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_surat_ijin')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_surat_ijin'),$foto_surat_ijin);
        }else{
            $foto_surat_ijin=null;
        }
        if($request->hasFile('foto_npwp_pemilik')){
            $foto_npwp_pemilik = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_npwp_pemilik')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_npwp_pemilik'),$foto_npwp_pemilik);
        }else{
            $foto_npwp_pemilik=null;
        }
        if($request->hasFile('foto_npwp_bu')){
            $foto_npwp_bu = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_npwp_bu')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_npwp_bu'),$foto_npwp_bu);
        }else{
            $foto_npwp_bu=null;
        }
        if($request->hasFile('foto_sk_usaha')){
            $foto_sk_usaha = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sk_usaha')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sk_usaha'),$foto_sk_usaha);
        }else{
            $foto_sk_usaha=null;
        }
        if($request->hasFile('foto_tdup')){
            $foto_tdup = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_tdup')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_tdup'),$foto_tdup);
        }else{
            $foto_tdup=null;
        }
        if($request->hasFile('foto_akta_usaha')){
            $foto_akta_usaha = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_akta_usaha')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_akta_usaha'),$foto_akta_usaha);
        }else{
            $foto_akta_usaha=null;
        }
        if($request->hasFile('foto_pirt')){
            $foto_pirt = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_pirt')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_pirt'),$foto_pirt);
        }else{
            $foto_pirt=null;
        }
        if($request->hasFile('foto_sh')){
            $foto_sh = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sh')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sh'),$foto_sh);
        }else{
            $foto_sh=null;
        }
        if($request->hasFile('foto_sni')){
            $foto_sni = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sni')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sni'),$foto_sni);
        }else{
            $foto_sni=null;
        }
        if($request->hasFile('foto_izin_alat_kesehatan')){
            $foto_izin_alat_kesehatan = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_izin_alat_kesehatan')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_izin_alat_kesehatan'),$foto_izin_alat_kesehatan);
        }else{
            $foto_izin_alat_kesehatan=null;
        }
        if($request->hasFile('foto_pkrt')){
            $foto_pkrt = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_pkrt')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_akta_usaha'),$foto_pkrt);
        }else{
            $foto_pkrt=null;
        }
        if($request->hasFile('foto_iso')){
            $foto_iso = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_iso')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_iso'),$foto_iso);
        }else{
            $foto_iso=null;
        }
        if($request->hasFile('foto_keamanan')){
            $foto_keamanan = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_keamanan')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_keamanan'),$foto_keamanan);
        }else{
            $foto_keamanan=null;
        }
        if($request->hasFile('foto_halal')){
            $foto_halal = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_halal')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_halal'),$foto_halal);
        }else{
            $foto_halal=null;
        }
        if($request->hasFile('foto_bpom')){
            $foto_bpom = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_bpom')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_bpom'),$foto_bpom);
        }else{
            $foto_bpom=null;
        }
        if($request->hasFile('foto_sertifikat_khusus_pangan')){
            $foto_sertifikat_khusus_pangan = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sertifikat_khusus_pangan')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sertifikat_khusus_pangan'),$foto_sertifikat_khusus_pangan);
        }else{
            $foto_sertifikat_khusus_pangan=null;
        }
        if($request->hasFile('foto_sertifikat_non_pangan')){
            $foto_sertifikat_non_pangan = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sertifikat_non_pangan')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sertifikat_non_pangan'),$foto_sertifikat_non_pangan);
        }else{
            $foto_sertifikat_non_pangan=null;
        }
            $umkms = $request->session()->get('umkms');
            $umkms->fill($validatedData);
            $umkms->foto_sertifikat_non_pangan = $foto_sertifikat_non_pangan;
            $umkms->foto_sertifikat_khusus_pangan = $foto_sertifikat_khusus_pangan;
            $umkms->foto_bpom = $foto_bpom;
            $umkms->foto_halal = $foto_halal;
            $umkms->foto_keamanan = $foto_keamanan;
            $umkms->foto_iso = $foto_iso;
            $umkms->foto_pkrt = $foto_pkrt;
            $umkms->foto_izin_alat_kesehatan = $foto_izin_alat_kesehatan;
            $umkms->foto_sni = $foto_sni;
            $umkms->foto_pirt = $foto_pirt;
            $umkms->foto_sh = $foto_sh;
            $umkms->foto_akta_usaha = $foto_akta_usaha;
            $umkms->foto_tdup = $foto_tdup;
            $umkms->foto_sk_usaha = $foto_sk_usaha;
            $umkms->foto_iumk = $foto_iumk;
            $umkms->foto_sku = $foto_sku;
            $umkms->foto_izin_usaha_industri = $foto_izin_usaha_industri;
            $umkms->foto_surat_ijin = $foto_surat_ijin;
            $umkms->foto_npwp_pemilik = $foto_npwp_pemilik;
            $umkms->foto_npwp_bu = $foto_npwp_bu;
            $request->session()->put('umkms', $umkms);
        return redirect()->route('umkm7.show');
    }
    public function input_umkm7(Request $request){
        $umkms = $request->session()->get('umkms');
        return view('umkm/umkm_step_7');
    }
    public function post_umkm7(Request $request){
        $validatedData = $request->validate([
            
        ]);
            
        $umkms = $request->session()->get('umkms');
        $umkms->fill($validatedData);
        $umkms->save();
  
        $request->session()->forget('umkms');
  
        return redirect()->route('umkm.show')->with('success','Anda Telah berhasil Mendaftar Dimohon menunggu untuk pemberitahuan selanjutnya');
    }
    public function delete_ukm(Request $request,$id){
        $umkms = umkms::find($id);
        $umkms->delete();

        return redirect()->route('finance.ukm')
                             ->with('success','kategori Berhasl Di Hapus');
    }

    public function update_ukm(Request $request,$id){
        //pane 1
        $nama_usaha = $request->nama_usaha;
        $bentuk_usaha = $request->bentuk_usaha;
        $tahun_usaha = $request->tahun_usaha;
        $omset = $request->omset;
        $bidang_usaha = $request->bidang_usaha;
        $no_telp_usaha = $request->no_telp_usaha;
        //pane 2
        $jenis_produk = $request->jenis_produk;
        if($request->hasFile('foto_produk')){
            $foto_produk = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_produk')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_produk'),$foto_produk);
        }else{
            $umkms = umkms::find($id);
            $foto_produk = $umkms->foto_produk;
        }
        $bahan_baku = $request->bahan_baku;
        $kebutuhan_bahan = $request->kebutuhan_bahan;
        $nama_merk = $request->nama_merk;
        $deskripsi_produk = $request->deksripsi_produk;
        $variasi_produk = $request->variasi_produk;
        $deskripsi_usaha = $request->deskripsi_usaha;
        //pane 3
        $karyawan_tetap_pria = $request->karyawan_tetap_pria;
        $karyawan_tidak_tetap_pria = $request->karyawan_tidak_tetap_pria;
        $karyawan_tetap_wanita = $request->karyawan_tetap_wanita;
        $karyawan_tidak_tetap_wanita = $request->karyawan_tidak_tetap_wanita;
        $nama_pengurus = $request->nama_pengurus;
        $kontak = $request->kontak;
        $jabatan = $request->jabatan;
        //pane 4
        if($request->hasFile('foto_pj')){
            $foto_pj = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_pj')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_pj'),$foto_pj);
        }else{
            $umkms = umkms::find($id);
            $foto_pj = $umkms->foto_pj;
        }
        $no_ktp_pj = $request->no_ktp_pj;
        $nama_lengkap = $request->nama_lengkap;
        $email = $request->email;
        $alamat = $request->alamat;
        $provinsi = $request->provinsi;
        $kota = $request->kota;
        $desa = $request->desa;
        $kode_pos = $request->kode_pos;
        $no_telp_rumah = $request->no_telp_rumah;
        $no_hp = $request->no_hp;
        if($request->hasFile('foto_ktp')){
            $foto_ktp = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_ktp')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_ktp'),$foto_ktp);
        }else{
            $umkms = umkms::find($id);
            $foto_ktp = $umkms->foto_ktp;
        }
        //pane 5
        $alamat_usaha = $request->alamat_usaha;
        $provinsi = $request->provinsi_usaha;
        $kota = $request->kota_usaha;
        $alamat_usaha_lain = $request->alamat_usaha_lain;
        $alamat_usaha_lain2 = $request->alamat_usaha_lain2;
        //pane 6
        if($request->hasFile('foto_iumk')){
            $foto_iumk = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_iumk')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_iumk'),$foto_iumk);
        }else{
            $umkms = umkms::find($id);
            $foto_iumk = $umkms->foto_iumk;
        }
        if($request->hasFile('foto_sku')){
            $foto_sku = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sku')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sku'),$foto_sku);
        }else{
            $umkms = umkms::find($id);
            $foto_sku = $umkms->foto_sku;
        }
        if($request->hasFile('foto_izin_usaha_industri')){
            $foto_izin_usaha_industri = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_izin_usaha_industri')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_izin_usaha_industri'),$foto_izin_usaha_industri);
        }else{
            $umkms = umkms::find($id);
            $foto_izin_usaha_industri = $umkms->foto_izin_usaha_industri;
        }
        if($request->hasFile('foto_surat_ijin')){
            $foto_surat_ijin = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_surat_ijin')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_surat_ijin'),$foto_surat_ijin);
        }else{
            $umkms = umkms::find($id);
            $foto_surat_ijin = $umkms->foto_surat_ijin;
        }
        if($request->hasFile('foto_npwp_pemilik')){
            $foto_npwp_pemilik = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_npwp_pemilik')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_npwp_pemilik'),$foto_npwp_pemilik);
        }else{
            $umkms = umkms::find($id);
            $foto_npwp_pemilik = $umkms->foto_npwp_pemilik;
        }
        if($request->hasFile('foto_npwp_bu')){
            $foto_npwp_bu = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_npwp_bu')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_npwp_bu'),$foto_npwp_bu);
        }else{
            $umkms = umkms::find($id);
            $foto_npwp_bu = $umkms->foto_npwp_bu;
        }
        if($request->hasFile('foto_sk_usaha')){
            $foto_sk_usaha = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sk_usaha')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sk_usaha'),$foto_sk_usaha);
        }else{
            $umkms = umkms::find($id);
            $foto_sk_usaha = $umkms->foto_sk_usaha;
        }
        if($request->hasFile('foto_tdup')){
            $foto_tdup = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_tdup')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_tdup'),$foto_tdup);
        }else{
            $umkms = umkms::find($id);
            $foto_tdup = $umkms->foto_tdup;
        }
        if($request->hasFile('foto_akta_usaha')){
            $foto_akta_usaha = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_akta_usaha')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_akta_usaha'),$foto_akta_usaha);
        }else{
            $umkms = umkms::find($id);
            $foto_akta_usaha = $umkms->foto_akta_usaha;
        }
        if($request->hasFile('foto_pirt')){
            $foto_pirt = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_pirt')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_pirt'),$foto_pirt);
        }else{
            $umkms = umkms::find($id);
            $foto_pirt = $umkms->foto_pirt;
        }
        if($request->hasFile('foto_sh')){
            $foto_sh = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sh')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sh'),$foto_sh);
        }else{
            $umkms = umkms::find($id);
            $foto_sh = $umkms->foto_sh;
        }
        if($request->hasFile('foto_sni')){
            $foto_sni = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sni')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sni'),$foto_sni);
        }else{
            $umkms = umkms::find($id);
            $foto_sni = $umkms->foto_sni;
        }
        if($request->hasFile('foto_izin_alat_kesehatan')){
            $foto_izin_alat_kesehatan = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_izin_alat_kesehatan')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_izin_alat_kesehatan'),$foto_izin_alat_kesehatan);
        }else{
            $umkms = umkms::find($id);
            $foto_izin_alat_kesehatan = $umkms->foto_izin_alat_kesehatan;
        }
        if($request->hasFile('foto_pkrt')){
            $foto_pkrt = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_pkrt')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_akta_usaha'),$foto_pkrt);
        }else{
            $umkms = umkms::find($id);
            $foto_pkrt = $umkms->foto_pkrt;
        }
        if($request->hasFile('foto_iso')){
            $foto_iso = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_iso')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_iso'),$foto_iso);
        }else{
            $umkms = umkms::find($id);
            $foto_iso = $umkms->foto_iso;
        }
        if($request->hasFile('foto_keamanan')){
            $foto_keamanan = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_keamanan')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_keamanan'),$foto_keamanan);
        }else{
            $umkms = umkms::find($id);
            $foto_keamanan = $umkms->foto_keamanan;
        }
        if($request->hasFile('foto_halal')){
            $foto_halal = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_halal')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_halal'),$foto_halal);
        }else{
            $umkms = umkms::find($id);
            $foto_halal = $umkms->foto_halal;
        }
        if($request->hasFile('foto_bpom')){
            $foto_bpom = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_bpom')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_bpom'),$foto_bpom);
        }else{
            $umkms = umkms::find($id);
            $foto_bpom = $umkms->foto_bpom;
        }
        if($request->hasFile('foto_sertifikat_khusus_pangan')){
            $foto_sertifikat_khusus_pangan = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sertifikat_khusus_pangan')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sertifikat_khusus_pangan'),$foto_sertifikat_khusus_pangan);
        }else{
            $umkms = umkms::find($id);
            $foto_sertifikat_khusus_pangan = $umkms->foto_sertifikat_khusus_pangan;
        }
        if($request->hasFile('foto_sertifikat_non_pangan')){
            $foto_sertifikat_non_pangan = date("h:i:s").preg_replace('/\s+/', '', $request->file('foto_sertifikat_non_pangan')->getClientOriginalName());
            Storage::disk('umkm')->putFileAs('/',$request->file('foto_sertifikat_non_pangan'),$foto_sertifikat_non_pangan);
        }else{
            $umkms = umkms::find($id);
            $foto_sertifikat_non_pangan = $umkms->foto_sertifikat_non_pangan;
        }
        $iumk  = $request->iumk;
        $sku  = $request->sku;
        $izin_usaha_industri = $request->izin_usaha_industri;
        $surat_ijin = $request->surat_ijin;
        $npwp_pemilik = $request->npwp_pemilik;
        $npwp_bu = $request->npwp_bu;
        $sk_usaha = $request->sk_usaha;
        $tdup = $request->tdup;
        $akta_usaha = $request->akta_usaha;
        $imb = $request->imb;
        $tanpaberkas = $request->tanpaberkas;
        $pirt = $request->pirt;
        $sh = $request->sh;
        $sni = $request->sni;
        $izin_alat_kesehatan = $request->izin_alat_kesehatan;
        $pkrt = $request->pkrt;
        $iso = $request->iso;
        $keamanan = $request->keamanan;
        $halal = $request->halal;
        $bpom = $request->bpom;
        $sertifikat_khusus_pangan = $request->sertifikat_khusus_pangan;
        $sertifikat_non_pangan = $request->sertifikat_non_pangan;
        $tanpa_sertifikat = $request->tanpa_sertifikat;
        //pane 7
        $website = $request->website;
        $sosmed = $request->sosmed;
        $link_sosmed = $request->link_sosmed;
        $marketplace = $request->marketplace;
        $link_marketplace = $request->link_marketplace;
        $nama_mentor = $request->nama_mentor;
        $kontak_mentor = $request->kontak_mentor;
        $jenis_kontak_mentor = $request->jenis_kontak_mentor;
        $asosiasi_komunitas = $request->asosiasi_komunitas;
        $nama_organisasi = $request->nama_organisasi;

        $umkms = umkms::where('id',$id)->update([
            'nama_usaha' => $nama_usaha,
            'bentuk_usaha' => $bentuk_usaha,
            'tahun_usaha' => $tahun_usaha,
            'omset' => $omset,
            'bidang_usaha' => $bidang_usaha,
            'no_telp_usaha' => $no_telp_usaha,
            'jenis_produk' => $jenis_produk,
            'foto_produk' => $foto_produk,
            'bahan_baku' => $bahan_baku,
            'kebutuhan_bahan' => $kebutuhan_bahan,
            'nama_merk' => $nama_merk,
            'deskripsi_produk' => $deskripsi_produk,
            'variasi_produk' => $variasi_produk,
            'deskripsi_usaha' => $deskripsi_usaha,
            'karyawan_tetap_pria' => $karyawan_tetap_pria,
            'karyawan_tidak_tetap_pria' => $karyawan_tidak_tetap_pria,
            'karyawan_tetap_wanita' => $karyawan_tetap_wanita,
            'karyawan_tidak_tetap_wanita' => $karyawan_tidak_tetap_wanita,
            'nama_pengurus' => $nama_pengurus,
            'kontak' => $kontak,
            'jabatan' => $jabatan,
            'no_ktp_pj' => $no_ktp_pj,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'alamat' => $alamat,
            'provinsi' => $provinsi,
            'kota' => $kota,
            'desa' => $desa,
            'kode_pos' => $kode_pos,
            'no_telp_rumah' => $no_telp_rumah,
            'no_hp' => $no_hp,
            'foto_ktp' => $foto_ktp,
            'foto_pj' => $foto_pj,
            'alamat_usaha_utama' => $alamat_usaha,
            'provinsi_usaha' => $provinsi_usaha,
            'kota_usaha' => $kota_usaha,
            'alamat_usaha_lain' => $alamat_usaha_lain,
            'alamat_usaha_lain2' => $alamat_usaha_lain2,
            'iumk' => $iumk,
            'sku' => $sku,
            'izin_usaha_industri' => $izin_usaha_industri,
            'surat_ijin' => $surat_ijin,
            'npwp_pemilik' => $npwp_pemilik,
            'npwp_bu' => $npwp_bu,
            'sk_usaha' => $sk_usaha,
            'tdup' => $tdup,
            'akta_usaha' => $akta_usaha,
            'imb' => $imb,
            'tanpaberkas'=> $tanpaberkas,
            'foto_iumk' => $foto_iumk,
            'foto_sku' => $foto_sku,
            'foto_izin_usaha_industri' => $foto_izin_usaha_industri,
            'foto_surat_ijin' => $foto_surat_ijin,
            'foto_npwp_pemilik' => $foto_npwp_pemilik,
            'foto_npwp_bu' => $foto_npwp_bu,
            'foto_sk_usaha' => $foto_sk_usaha,
            'foto_tdup' => $foto_tdup,
            'foto_akta_usaha' => $foto_akta_usaha,
            'pirt' => $pirt,
            'sh' => $sh,
            'sni' => $sni,
            'izin_alat_kesehatan'=> $izin_alat_kesehatan,
            'pkrt' =>$pkrt,
            'iso'=>$iso,
            'keamanan' =>$keamanan,
            'halal'=>  $halal,
            'bpom'=>$bpom,
            'sertifikat_khusus_pangan'=>$sertifikat_khusus_pangan,
            'sertifikat_non_pangan'=>$sertifikat_non_pangan,
            'tanpa_sertifikat'=>$tanpa_sertifikat,
            'foto_pirt' => $foto_pirt,
            'foto_sh' => $foto_sh,
            'foto_sni' => $foto_sni,
            'foto_izin_alat_kesehatan'=> $foto_izin_alat_kesehatan,
            'foto_pkrt' =>$foto_pkrt,
            'foto_iso'=>$foto_iso,
            'foto_keamanan' =>$foto_keamanan,
            'foto_halal'=> $foto_halal,
            'foto_bpom'=>$foto_bpom,
            'foto_sertifikat_khusus_pangan'=>$foto_sertifikat_khusus_pangan,
            'foto_sertifikat_non_pangan'=>$foto_sertifikat_non_pangan,
            'website' => $website,
            'sosmed' => $sosmed,
            'link_sosmed' => $link_sosmed,
            'marketplace' => $marketplace,
            'link_marketplace' => $link_marketplace,
            'nama_mentor'=>$nama_mentor,
            'kontak_mentor'=>$kontak_mentor,
            'jenis_kontak_mentor'=>$jenis_kontak_mentor,
            'asosiasi_komunitas' =>$asosiasi_komunitas,
            'nama_organisasi'=>$nama_organisasi,
        ]);
        return redirect()->route('ukm.view')->with('success','Berhasil Mengedit UKM');
    }
}

                                                                                                                          
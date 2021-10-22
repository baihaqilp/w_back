<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Produk;
use App\User;
use App\Anggotas;
use App\Banner;
use App\Banners;
use App\Beritas;
use App\Kategoris;
use App\Ongkirs;
use App\umkms;
use App\Admin;
use App\Pesanan;
use App\Investor;
use App\Produks;

class DashboardInvestor extends Controller
{
    //
    public function _construct(){
        $this->middleware('auth:investor');
    }
    public function index_produk(){
        $produks = Produks::join('kategoris','kategoris.id','=','produks.id_kategori')
                            ->select('produks.*','kategoris.nama_kategori AS nama_kategori')
                            ->orderBy('id','ASC')->get();
        $kategoris = Kategoris::all();
        
        return view('investors/produk',['produks'=>$produks,'kategoris'=>$kategoris]);
    }
    public function index_anggota(){
        $anggota = User::orderBy('id','ASC')->get();
        return view('investors/anggota',['anggota' => $anggota]);
        
    }
    public function index_pesanan(){
       $pesanan = Pesanan::join('addresses','addresses.id','=','pesanans.alamat')
                            ->join('produks','produks.id','=','pesanans.id_produk')
                            ->select('pesanans.*', 'addresses.penerima As penerima','produks.nama_produk AS nama_produk')
                            ->orderBy('created_at','desc')->get();
        return view('investors/pesanan/pesanan',['pesanan'=>$pesanan]);
    }
    public function index_kategori(){
        $kategoris = Kategoris::all();
        return view('investors/kategori',['kategoris' => $kategoris]);
    }
    public function index_ongkir(){
        $ongkir = Ongkirs::latest()->get();
        return view('investors/Ongkir',['ongkir' => $ongkir]);
    }
    public function index_komponenharga(){
        $harga = Produks::all();
        return view('finance/komponenharga',['harga'=>$harga]);
    }
    public function index_admin(){
        $admins = Admin::all();
        return view('investors/admin',['admins'=>$admins]);
    }
    public function index_mitra(){
        $mitras = Investor::all();
        return view('investors/mitra',['mitras'=>$mitras]);
    }
    public function index_berita(){
        $beritas = Beritas::all();
        return view('investors/berita',['beritas'=>$beritas]);
    }

    public function index_banner(){
        $banners = Banners::all();
        return view('investors/banner',['banners'=>$banners]);
    }
    public function index_ukm(){
        $ukm = umkms::all();
        return view('investors/ukm',['ukm' => $ukm]);
    }

    public function map(){
        return view('map_investor');
    }

    public function view_pesanan_selesai(){
        $pesanan = Pesanan::join('addresses','addresses.id','=','pesanans.alamat')
        ->join('produks','produks.id','=','pesanans.id_produk')
        ->select('pesanans.*', 'addresses.penerima As penerima','produks.nama_produk AS nama_produk')
        ->orderBy('created_at','desc')->where('status_pesanan',6)->get();

        return view('investors/pesanan/pesanan_selesai',['pesanan'=>$pesanan]);
    }

}

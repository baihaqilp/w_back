<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Produks;
use App\Kategoris;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProdukEccoController extends Controller
{
    public function index(Request $request){
        $query=Produks::query();

        $id_kategori = (!empty($_POST["id_kategori"])) ? ($_POST["id_kategori"]) : ('');
            if($id_kategori){       
             $query->where('id_kategori',$id_kategori);
            }

        $produks = $query->join('kategoris','kategoris.id','=','produks.id_kategori')
                            ->select('produks.*','kategoris.nama_kategori AS nama_kategori')
                            ->orderBy('id','ASC')->get();
        $kategoris = Kategoris::all();
        
        return view('finance/produk',['produks'=>$produks,'kategoris'=>$kategoris]);
    }

    public function index_investor(){
        $produks = Produks::join('kategoris','kategoris.id','=','produks.id_kategori')
                            ->select('produks.*','kategoris.nama_kategori AS nama_kategori')
                            ->orderBy('id','ASC')->get();
        $kategoris = Kategoris::all();
        
        return view('/layoutInvestor/eccomerce/produk',['produks'=>$produks,'kategoris'=>$kategoris]);
    }

    public function view_tambah_gambar(Request $request,$id){
        $produk = Produks::find($id);
    
        return view('finance/TambahGambarProduk',['produk'=>$produk]);
    }

    public function tambah_gambar(Request $request,$id){
        $produk = Produks::find($id);
        foreach(json_decode($produk->image) as $kontol){
            $data[]= $kontol;
        }
        
        foreach($request->image as $images){
            $images_name = date("h:i:s").preg_replace('/\s+/', '', $image->getClientOriginalName());
            $data[]= $images_name;
            Storage::disk('produk')->putFileAs('/',$image,$image_name); 
        }
         
        $produk->image = json_encode($data);

        $produk->save();
        
            
        return redirect()->route('produk.finance')
                            ->with('success','Berhasil Menambahkan Gambar');
        
    }
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,giv,svg|max:2048'
        ]);

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $image_name= date("h:i:s").preg_replace('/\s+/', '', $image->getClientOriginalName());
                $save = Storage::disk('produk')->putFileAs('/',$image,$image_name);
                  
                $data[] = $image_name;
                
            }
            $produks = new Produks;
            //Storage::disk('produk')->putFileAs('/',$request->file('image'),$image_name);
            //$produks->image = $image_name;
            $produks->image = json_encode($data);
            $produks->nama_produk = $request->nama_produk;
            $produks->id_kategori = $request->id_kategori ;
            $produks->umkm = $request->umkm;
            $produks->deskripsi = $request->deskripsi;
            $produks->alamat = $request->alamat;
            $produks->kemasan = $request->kemasan;
            $produks->biaya_kirim = $request->biaya_kirim;
            $produks->kuantitas_beli = $request->kuantitas_beli;
            $produks->harga_pabrik = $request->harga_beli_pabrik;
            $produks->biaya_kirim_gudang_utama = $request->biaya_kirim_pabrik;
            $produks->biaya_kirim_gudang_kec = $request->biaya_kirim_gudang;
            $produks->biaya_bongkar_gudang = $request->biaya_bongkar_gudang;
            $produks->biaya_bongkar_pabrik = $request->biaya_bongkar_pabrik;
            $produks->overhead = $request->overhead;
            $produks->total_cogs = $request->total_cogs;
            $produks->cogs_satuan = $request->cogs_satuan;
            $produks->margin = $request->margin;
            $produks->harga_jual_1 = $request->harga_jual_1;
            $produks->pajak = $request->pajak;
            $produks->harga_jual_final = $request->harga_jual_final;
            
            $produks->save();
            return redirect()->route('produk.finance')
                            ->with('success','Berhasil Menambahkan Produk');
        }

    }
    public function input_produk(Request $request){
        if($request->hasFile('image'))
        {
            if($request->file('image')->isValid())
            {
                $validated = $request->validate([
                    'image' => 'mimes:jpeg,png,jpg|max:10240',
                ]);
            }
            $produks = new Produks;
            $image_name = date("h:i:s").preg_replace('/\s+/', '', $request->file('image')->getClientOriginalName());
            Storage::disk('produk')->putFileAs('/',$request->file('image'),$image_name);
            $produks->image = $image_name;
            $produks->nama_produk = $request->nama_produk;
            $produks->id_kategori = $request->id_kategori ;
            $produks->umkm = $request->umkm;
            $produks->deskripsi = $request->deskripsi;
            $produks->alamat = $request->alamat;
            $produks->kemasan = $request->kemasan;
            $produks->biaya_kirim = $request->biaya_kirim;
            $produks->kuantitas_beli = $request->kuantitas_beli;
            $produks->harga_pabrik = $request->harga_beli_pabrik;
            $produks->biaya_kirim_gudang_utama = $request->biaya_kirim_pabrik;
            $produks->biaya_kirim_gudang_kec = $request->biaya_kirim_gudang;
            $produks->biaya_bongkar_gudang = $request->biaya_bongkar_gudang;
            $produks->biaya_bongkar_pabrik = $request->biaya_bongkar_pabrik;
            $produks->overhead = $request->overhead;
            $produks->total_cogs = $request->total_cogs;
            $produks->cogs_satuan = $request->cogs_satuan;
            $produks->margin = $request->margin;
            $produks->harga_jual_1 = $request->harga_jual_1;
            $produks->pajak = $request->pajak;
            $produks->harga_jual_final = $request->harga_jual_final;
            
            $produks->save();
            return redirect()->route('produk.finance')
                            ->with('success','Berhasil Menambahkan Produk');
            }
            abort(500, 'Could not upload image :(');
        
    }
    public function hapus_produk(request $request, $id)
    {
        # code...
        
        $produks = Produks::find($id);
        $produks->delete();

        return redirect()->route('produk.finance')
                            ->with('danger','Berhasil Menghapus Produk');

    }
    public function view_update_produk(request $request,$id){
        $produk = Produks::find($id);
        $produk_kategori = Kategoris::find($produk['id_kategori']);  
        $kategoris = Kategoris::all();
        return view('finance/EditProduk',['produk'=>$produk,'kategoris'=>$kategoris,'produk_kategori' => $produk_kategori]);
    }

    public function update_produk(request $request, $id){
        if($request->hasFile('image')){
            $image_name = date("h:i:s").preg_replace('/\s+/', '', $request->file('image')->getClientOriginalName());
            Storage::disk('produk')->putFileAs('/',$request->file('image'),$image_name);
        }else{
            $produk = Produks::find($id);
            $image_name = $produk->image;
        }
       
        $nama_produk = $request->nama_produk;
        $id_kategori = $request->id_kategori;
        $umkm = $request->umkm;
        $deskripsi = $request->deskripsi;
        $alamat = $request->alamat;
        $kemasan = $request->kemasan;
        $biaya_kirim = $request->biaya_kirim;
        $kuantitas_beli = $request->kuantitas_beli;
        $harga_pabrik = $request->harga_beli_pabrik;
        $biaya_kirim_gudang_utama = $request->biaya_kirim_pabrik;
        $biaya_kirim_gudang_kec = $request->biaya_kirim_gudang;
        $biaya_bongkar_gudang = $request->biaya_bongkar_gudang;
        $biaya_bongkar_pabrik = $request->biaya_bongkar_pabrik;
        $overhead = $request->overhead;
        $total_cogs = $request->total_cogs;
        $cogs_satuan = $request->cogs_satuan;
        $margin = $request->margin;
        $harga_jual_1 = $request->harga_jual_1;
        $pajak = $request->pajak;
        $harga_jual_final = $request->harga_jual_final;

        $produks = Produks::where('id',$id)->update([
            'nama_produk' => $nama_produk,
            'image' => $image_name,
            'id_kategori' => $id_kategori,
            'umkm' => $umkm, 
            'deskripsi' => $deskripsi,
            'alamat' => $alamat,
            'kemasan' => $kemasan,
            'biaya_kirim' => $biaya_kirim,
            'kuantitas_beli' => $kuantitas_beli,
            'harga_pabrik' => $harga_pabrik,
            'biaya_kirim_gudang_utama' => $biaya_kirim_gudang_utama,
            'biaya_kirim_gudang_kec' => $biaya_kirim_gudang_kec,
            'biaya_bongkar_gudang' => $biaya_bongkar_gudang,
            'biaya_bongkar_pabrik' => $biaya_bongkar_pabrik,
            'overhead' => $overhead,
            'total_cogs' => $total_cogs,
            'cogs_satuan' => $cogs_satuan,
            'margin' => $margin,
            'harga_jual_1' => $harga_jual_1,
            'pajak' => $pajak,
            'harga_jual_final' => $harga_jual_final,
        ]);
        return redirect()->route('produk.finance')
                            ->with('success','Berhasil Mengedit Produk');
    }
    public function form_produk(){
        $kategoris = Kategoris::all();
        return view('finance/tambah_produk',['kategoris'=>$kategoris]);
    }
    public function image($fileName){
        $path = public_path().'/img/kategori/'.$fileName;
        return response()->download($path);        
    }

    public function tampil($id){
        $produk = Produks::where('id',$id)->update([
            'visibilitas' => true,
        ]);
        
        return redirect()->route('produk.finance')->with('tampil_success','Berhasil Menampilkan Produk Di Aplikasi Eccommerce');
    }

    public function hide($id){
        $produk = Produks::where('id',$id)->update([
            'visibilitas' => false,
        ]);

        return redirect()->route('produk.finance')->with('hide_success','Berhasil Menyembunyikan Produk Di Aplikasi Eccommerce');
    }
    
}
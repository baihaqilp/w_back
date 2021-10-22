<?php

namespace App\Http\Controllers\Finance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Banners;
class BannerController extends Controller
{
    public function _construct(){
        $this->middleware('auth:admin');
    }

    public function index(Request $request){
        $query=Banners::query();

        $tanggal_awal = (!empty($_GET["tanggal_awal"])) ? ($_GET["tanggal_awal"]) : ('');
        $tanggal_akhir = (!empty($_GET["tanggal_akhir"])) ? ($_GET["tanggal_akhir"]) : ('');
        if($tanggal_awal && $tanggal_akhir){
         
            $tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
            $tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));
             
            $query->whereRaw("date(banners.created_at) >= '" . $tanggal_awal . "' AND date(banners.created_at) <= '" . $tanggal_akhir . "'");
           }
        $banners = $query->select('banners.*')->orderBy('id','ASC')->get();
        return view('finance/banner',['banners'=>$banners]);
    }
    public function input_banner(request $request)
    {
        if($request->hasFile('banner'))
        {
            if($request->file('banner')->isValid())
            {
                $validated = $request->validate([
                    'banner' => 'mimes:jpeg,png,jpg|max:10240',
                ]);
            }
                $banners = new Banners;
                $banner = date("h:i:s").preg_replace('/\s+/', '', $request->file('banner')->getClientOriginalName());
                Storage::disk('banner')->putFileAs('/',$request->file('banner'),$banner);
                $banners->banner = $banner;
                
                $banners->save();
                return redirect()->route('banner.finance')
                            ->with('success','Berhasil Menambahkan Banner');
        }
        abort(500, 'Could not upload image :(');
    }
    public function delete_banner(request $request,$id){

        $banners = Banners::find($id);
        $banners->delete();

        return redirect()->route('banner.finance')
                            ->with('danger','Berhasil Menghapus Banner');


    }
}

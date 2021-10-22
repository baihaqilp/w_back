<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Produks;
class Produk extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $total = Produks::all();
        $sembako = Produks::join('kategoris','kategoris.id','=','produks.id_kategori')->whereIN('kategoris.kategori_induk',[
            'Beras',
            'Bumbu & Bahan Masakan'	
        ])->get();
        $umkm = Produks::where('umkm',true)->get();
        return view('widgets.produk', [
            'config' => $this->config,
            'total' => $total,
            'sembako' => $sembako,
            'umkm' => $umkm
        ]);
    }
}

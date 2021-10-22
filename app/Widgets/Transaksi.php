<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Pesanan;
use Carbon\Carbon;

class Transaksi extends AbstractWidget
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
        
        $bulan = Pesanan::whereMonth('created_at', Carbon::now()->month)->get();
        $minggu = Pesanan::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $hari = Pesanan::whereDay('created_at', Carbon::now()->day)->get();

        $bulan_nilai = Pesanan::whereMonth('created_at', Carbon::now()->month)->select(\DB::raw('SUM(total_pembayaran) as total'))->value('total');
        $minggu_nilai = Pesanan::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->select(\DB::raw('SUM(total_pembayaran) as total'))->value('total');
        $hari_nilai = Pesanan::whereDay('created_at', Carbon::now()->day)->select(\DB::raw('SUM(total_pembayaran) as total'))->value('total');
        return view('widgets.transaksi', [
            'config' => $this->config,
            'bulan' => $bulan,
            'minggu' => $minggu,
            'hari' => $hari,
            'bulan_nilai' => $bulan_nilai,
            'minggu_nilai' => $minggu_nilai,
            'hari_nilai' => $hari_nilai
        ]);
    }
}

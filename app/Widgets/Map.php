<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\User;
use App\Korus;
use App\Rantuss;
use App\Addresses;

class Map extends AbstractWidget
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
        $korus = Addresses::join('users','users.id','=','addresses.user_id')
                          ->where('is_korus',true)
                          ->where('is_main_address',true)->select('users.id','users.name','addresses.lat','addresses.lng')->get();

        $rantus = Addresses::join('users','users.id','=','addresses.user_id')
                          ->where('is_rantus',true)
                          ->where('is_main_address',true)->select('users.id','users.name','addresses.lat','addresses.lng')->get();

        $anggota = Addresses::join('users','users.id','=','addresses.user_id')
                          ->where('is_anggota',true)
                          ->where('is_korus',true)
                          ->where('is_rantus',true)
                          ->where('is_main_address',true)->select('users.id','users.name','addresses.lat','addresses.lng')->get();

        $anggotaUmum = Addresses::join('users','users.id','=','addresses.user_id')
                          ->where('is_main_address',true)
                          ->where('is_korus',false)
                          ->where('is_rantus',false)
                          ->where('is_anggota',false)
                          ->select('users.id','users.name','addresses.lat','addresses.lng')->get();
        return view('widgets.map', [
            'config' => $this->config,
            "korus" => $korus,
            "rantus"=> $rantus,
            "anggota" => $anggota,
            "umum" => $anggotaUmum
            
        ]);
    }
}

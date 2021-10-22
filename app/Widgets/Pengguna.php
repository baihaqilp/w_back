<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\User;

class Pengguna extends AbstractWidget
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
        $pengguna_totals = count(User::all());
        $anggota_koperasis = count(User::where('is_anggota',true)->get());
        $ukms = 0;
        return view('widgets.pengguna', [
            'config' => $this->config,
            'pengguna_totals' => $pengguna_totals,
            'anggota_koperasis' => $anggota_koperasis,
            'ukms' => $ukms,
        ]);
    }
}

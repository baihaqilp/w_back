<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\User;

class TopDaerah extends AbstractWidget
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
        $top = User::join('addresses','addresses.user_id','=','users.id')
                    ->join('provinsis','provinsis.kode_provinsi' ,'=','addresses.provinsi')
                    ->select('provinsis.provinsi',\DB::raw(' COUNT(provinsis.provinsi) as total'))->groupBy('provinsis.provinsi')
                    ->orderBy('total','desc')
                    ->take(5)
                    ->get();

        return view('widgets.top_daerah', [
            'config' => $this->config,
            'top' => $top,
        ]);
    }
}

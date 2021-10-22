<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\User;
use App\Pesanan;

class DashboardChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {   
        
        $user = User::select(User::raw(' COUNT(id) as total'),User::raw("created_at::timestamp::date as date"))->groupBy('date')->orderBy('date')->pluck('total','date');
        $pesanan = Pesanan::select(User::raw(' COUNT(id) as total'),User::raw("created_at::timestamp::date as date"))->groupBy('date')->orderBy('date')->pluck('total','date');
        return Chartisan::build()
            ->labels($user->keys()->toArray())
            ->dataset('Anggota', $user->values()->toArray())
            ->dataset('Pesanan', $pesanan->values()->toArray());
    }
}
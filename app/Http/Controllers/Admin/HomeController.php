<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Dashboard Admin – ambil data statistik dari database
     */
    public function index()
    {
        $stats = [
            'total_user'       => DB::table('user')->count(),
            'total_pet'        => DB::table('pet')->count(),
            'total_pemilik'    => DB::table('pemilik')->count(),
            'total_rekam'      => DB::table('rekam_medis')->count(),
            'total_reservasi'  => DB::table('temu_dokter')->count(),
        ];

        // Ambil data chart contoh (misal jumlah rekam medis per bulan)
        $chartData = DB::table('rekam_medis')
            ->selectRaw('MONTH(created_at) as bulan, COUNT(*) as jumlah')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('jumlah', 'bulan');

        return view('dashboard.admin.index', compact('stats', 'chartData'));
    }
}

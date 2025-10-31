<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function index()
    {
        // cari pemilik yang sesuai dengan user login
        $pemilik = DB::table('pemilik')
            ->where('email', Auth::user()->email)
            ->first();

        if (!$pemilik) {
            return view('dashboard.pemilik.reservasi.index', ['reservasi' => collect()]);
        }

        // ambil semua data reservasi milik pemilik ini
        $reservasi = DB::table('temu_dokter as td')
            ->join('pet as p', 'p.idpet', '=', 'td.idpet')
            ->leftJoin('role_user as ru', 'ru.idrole_user', '=', 'td.idrole_user')
            ->leftJoin('user as u', 'u.iduser', '=', 'ru.iduser')
            ->where('p.idpemilik', $pemilik->idpemilik)
            ->select(
                'td.*',
                'p.nama as nama_pet',
                'u.nama as nama_dokter'
            )
            ->orderBy('td.waktu_daftar', 'desc')
            ->get();

        return view('dashboard.pemilik.reservasi.index', compact('reservasi'));
    }
}

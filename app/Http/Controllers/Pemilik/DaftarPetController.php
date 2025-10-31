<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DaftarPetController extends Controller
{
    public function index()
    {
        // ambil user yang login sekarang
        $iduser = Auth::user()->iduser;

        // cari idpemilik yang terhubung ke user login
        $pemilik = DB::table('pemilik')
            ->where('email', Auth::user()->email)
            ->first();

        if (!$pemilik) {
            return view('dashboard.pemilik.daftar-pet.index', ['pets' => collect()]);
        }

        // ambil semua pet milik pemilik ini
        $pets = DB::table('pet')
            ->join('ras_hewan as r', 'r.idras_hewan', '=', 'pet.idras_hewan')
            ->join('jenis_hewan as j', 'j.idjenis_hewan', '=', 'r.idjenis_hewan')
            ->where('pet.idpemilik', $pemilik->idpemilik)
            ->select('pet.*', 'r.nama_ras', 'j.nama_jenis_hewan')
            ->orderBy('pet.nama')
            ->get();

        return view('dashboard.pemilik.daftar-pet.index', compact('pets'));
    }
}

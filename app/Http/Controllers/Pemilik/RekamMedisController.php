<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    public function index()
    {
        $idpemilik = Auth::user()->iduser;
        $rekamMedis = DB::table('rekam_medis as rm')
            ->join('pet as p', 'p.idpet', '=', 'rm.idpet')
            ->where('p.idpemilik', $idpemilik)
            ->select('rm.*', 'p.nama as nama_pet')
            ->orderBy('rm.created_at', 'desc')
            ->get();

        return view('dashboard.pemilik.rekam-medis.index', compact('rekamMedis'));
    }

    public function show($id)
    {
        $header = DB::table('rekam_medis as rm')
            ->join('pet as p', 'p.idpet', '=', 'rm.idpet')
            ->join('pemilik as pm', 'pm.idpemilik', '=', 'p.idpemilik')
            ->select('rm.*', 'p.nama as nama_pet', 'pm.nama as nama_pemilik')
            ->where('rm.idrekam_medis', $id)
            ->first();

        $detail = DB::table('detail_rekam_medis as d')
            ->join('kode_tindakan_terapi as k', 'k.idkode_tindakan_terapi', '=', 'd.idkode_tindakan_terapi')
            ->leftJoin('kategori as kt', 'kt.idkategori', '=', 'k.idkategori')
            ->leftJoin('kategori_klinis as kk', 'kk.idkategori_klinis', '=', 'k.idkategori_klinis')
            ->where('d.idrekam_medis', $id)
            ->select('d.*', 'k.kode', 'k.deskripsi_tindakan_terapi', 'kt.nama as nama_kategori', 'kk.nama_kategori_klinis')
            ->get();

        return view('dashboard.pemilik.rekam-medis.show', compact('header', 'detail'));
    }
}

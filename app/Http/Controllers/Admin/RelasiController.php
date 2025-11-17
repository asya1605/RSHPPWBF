<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RelasiController extends Controller
{
    public function index()
    {
        // 🔹 RAW QUERY (Dokter)
        $rawDokter = DB::select("
            SELECT u.nama AS nama_user, u.email, d.bidang_dokter, d.no_hp
            FROM user u
            JOIN dokter d ON u.iduser = d.id_user
            ORDER BY u.nama
        ");

        // 🔹 QUERY BUILDER (Perawat)
        $queryPerawat = DB::table('perawat')
            ->join('user', 'perawat.id_user', '=', 'user.iduser')
            ->select('user.nama AS nama_user', 'user.email', 'perawat.pendidikan', 'perawat.no_hp')
            ->orderBy('user.nama')
            ->get();

        // 🔹 QUERY BUILDER (Resepsionis)
        $queryResepsionis = DB::table('resepsionis')
            ->join('user', 'resepsionis.id_user', '=', 'user.iduser')
            ->select('user.nama AS nama_user', 'user.email', 'resepsionis.no_hp')
            ->orderBy('user.nama')
            ->get();

        // 🔹 QUERY BUILDER (Pemilik)
        $queryPemilik = DB::table('pemilik')
            ->join('user', 'pemilik.id_user', '=', 'user.iduser')
            ->select('user.nama AS nama_user', 'user.email', 'pemilik.alamat', 'pemilik.no_hp')
            ->orderBy('user.nama')
            ->get();

        return view('dashboard.admin.laporan-relasi', compact(
            'rawDokter',
            'queryPerawat',
            'queryResepsionis',
            'queryPemilik'
        ));
    }
}

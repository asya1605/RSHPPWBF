<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    public function index(Request $request)
    {
        $selectedDate = $request->query('date', date('Y-m-d'));

        $list = DB::table('rekam_medis as rm')
            ->join('temu_dokter as td', 'td.idreservasi_dokter', '=', 'rm.idreservasi_dokter')
            ->join('pet as p', 'p.idpet', '=', 'rm.idpet')
            ->join('pemilik as pem', 'pem.idpemilik', '=', 'p.idpemilik')
            ->select(
                'rm.idrekam_medis',
                'rm.created_at',
                'rm.anamnesa',
                'rm.diagnosa',
                'td.idreservasi_dokter',
                'td.no_urut',
                'p.nama as nama_pet',
                'pem.nama as nama_pemilik',
                DB::raw('(SELECT COUNT(*) FROM detail_rekam_medis drm WHERE drm.idrekam_medis = rm.idrekam_medis) as jml_tindakan')
            )
            ->whereDate('rm.created_at', $selectedDate)
            ->orderBy('td.no_urut', 'asc')
            ->orderBy('rm.created_at', 'asc')
            ->get();

        return view('dashboard.dokter.rekam-medis.index', compact('list', 'selectedDate'));
    }

    public function show($id)
    {
        $rekam = DB::table('rekam_medis as rm')
            ->join('pet as p', 'p.idpet', '=', 'rm.idpet')
            ->join('pemilik as pem', 'pem.idpemilik', '=', 'p.idpemilik')
            ->select('rm.*', 'p.nama as nama_pet', 'pem.nama as nama_pemilik')
            ->where('rm.idrekam_medis', $id)
            ->first();

        if (!$rekam) {
            abort(404, 'Rekam medis tidak ditemukan.');
        }

        $detailTindakan = DB::table('detail_rekam_medis as drm')
            ->join('kode_tindakan_terapi as ktt', 'drm.idkode_tindakan_terapi', '=', 'ktt.idkode_tindakan_terapi')
            ->join('kategori as k', 'ktt.idkategori', '=', 'k.idkategori')
            ->join('kategori_klinis as kk', 'ktt.idkategori_klinis', '=', 'kk.idkategori_klinis')
            ->select(
                'ktt.kode',
                'ktt.deskripsi_tindakan_terapi',
                'k.nama as nama_kategori',
                'kk.nama_kategori_klinis',
                'drm.detail'
            )
            ->where('drm.idrekam_medis', $id)
            ->get();

        return view('dashboard.dokter.rekam-medis.show', compact('rekam', 'detailTindakan'));
    }
}

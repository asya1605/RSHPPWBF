<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    // Daftar rekam medis dengan filter tanggal
    public function index(Request $request)
    {
        $selectedDate = $request->query('date');

        // cari idrole_user untuk dokter yang lagi login
        $dokterRoleUserId = DB::table('role_user as ru')
            ->join('role as r', 'r.idrole', '=', 'ru.idrole')
            ->where('ru.iduser', Auth::id())
            ->where('r.nama_role', 'Dokter')
            ->value('ru.idrole_user');

        $list = DB::table('rekam_medis as rm')
            ->leftJoin('temu_dokter as td', 'td.idreservasi_dokter', '=', 'rm.idreservasi_dokter')
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

            // 🔹 FILTER DOKTER YANG LOGIN
            ->when($dokterRoleUserId, function ($q) use ($dokterRoleUserId) {
                $q->where('td.idrole_user', $dokterRoleUserId);
                // atau kalau kamu mau pakai kolom rm.dokter_pemeriksa:
                // $q->where('rm.dokter_pemeriksa', $dokterRoleUserId);
            })

            // 🔹 FILTER TANGGAL (kalau dipilih)
            ->when($selectedDate, function ($q) use ($selectedDate) {
                $q->whereDate('rm.created_at', $selectedDate);
            })

            ->orderByRaw('td.no_urut IS NULL') // NULL taruh bawah
            ->orderBy('td.no_urut')
            ->orderBy('rm.created_at')
            ->get();

        return view('dashboard.dokter.rekam-medis.index', compact('list', 'selectedDate'));
    }

    // Form tambah rekam medis baru
    public function create(Request $request)
    {
        $pets = DB::table('pet as p')
            ->join('pemilik as pem', 'pem.idpemilik', '=', 'p.idpemilik')
            ->select('p.idpet', 'p.nama as nama_pet', 'pem.nama as nama_pemilik')
            ->orderBy('pem.nama')
            ->get();

        // tidak perlu idreservasi_dokter di sini, nanti dicari otomatis di backend
        return view('dashboard.dokter.rekam-medis.create', compact('pets'));
    }

    // Simpan rekam medis baru
    public function store(Request $request)
    {
        $this->validateRekamMedis($request);
        $this->createRekamMedis($request);

        return redirect()->route('dokter.rekam-medis.index')
            ->with('ok', 'Rekam medis baru berhasil ditambahkan!');
    }

    // Detail rekam medis + list tindakan + master tindakan buat form tambah
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

        // Detail tindakan yang sudah tercatat
        $detailTindakan = DB::table('detail_rekam_medis as drm')
            ->join('kode_tindakan_terapi as ktt', 'drm.idkode_tindakan_terapi', '=', 'ktt.idkode_tindakan_terapi')
            ->join('kategori_klinis as kk', 'ktt.idkategori_klinis', '=', 'kk.idkategori_klinis')
            ->select(
                'drm.iddetail_rekam_medis',
                'drm.detail',
                'ktt.idkode_tindakan_terapi',
                'ktt.kode',
                'ktt.deskripsi_tindakan_terapi',
                'kk.nama_kategori_klinis'
            )
            ->where('drm.idrekam_medis', $id)
            ->get();

        // Master tindakan buat dropdown tambah tindakan
        $masterTindakan = DB::table('kode_tindakan_terapi as ktt')
            ->join('kategori_klinis as kk', 'ktt.idkategori_klinis', '=', 'kk.idkategori_klinis')
            ->select(
                'ktt.idkode_tindakan_terapi',
                'ktt.kode',
                'ktt.deskripsi_tindakan_terapi',
                'kk.nama_kategori_klinis'
            )
            ->orderBy('kk.nama_kategori_klinis')
            ->orderBy('ktt.kode')
            ->get();

        return view('dashboard.dokter.rekam-medis.show', compact('rekam', 'detailTindakan', 'masterTindakan'));
    }

    // Form edit rekam medis
    public function edit($id)
    {
        $rekam = DB::table('rekam_medis')->where('idrekam_medis', $id)->first();
        if (!$rekam) {
            abort(404, 'Data tidak ditemukan.');
        }

        $pets = DB::table('pet as p')
            ->join('pemilik as pem', 'pem.idpemilik', '=', 'p.idpemilik')
            ->select('p.idpet', 'p.nama as nama_pet', 'pem.nama as nama_pemilik')
            ->get();

        return view('dashboard.dokter.rekam-medis.edit', compact('rekam', 'pets'));
    }

    // Update rekam medis
    public function update(Request $request, $id)
    {
        $this->validateRekamMedis($request);

        DB::table('rekam_medis')
            ->where('idrekam_medis', $id)
            ->update([
                'idpet' => $request->idpet,
                'anamnesa' => $this->formatText($request->anamnesa),
                'temuan_klinis' => $this->formatText($request->temuan_klinis),
                'diagnosa' => $this->formatText($request->diagnosa),
                'updated_at' => now(),
            ]);

        return redirect()->route('dokter.rekam-medis.index')
            ->with('ok', 'Data rekam medis berhasil diperbarui!');
    }

    // Tambah tindakan terapi ke rekam medis
    public function storeTindakan(Request $request, $rekamId)
    {
        $request->validate([
            'idkode_tindakan_terapi' => 'required|integer|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'nullable|string|max:255',
        ]);

        $exists = DB::table('rekam_medis')
            ->where('idrekam_medis', $rekamId)
            ->exists();

        if (!$exists) {
            abort(404, 'Rekam medis tidak ditemukan.');
        }

        DB::table('detail_rekam_medis')->insert([
            'idrekam_medis' => $rekamId,
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
            'detail' => $this->formatText($request->detail),
        ]);

        return back()->with('ok', 'Tindakan terapi berhasil ditambahkan.');
    }

    // Update catatan tindakan
    public function updateTindakan(Request $request, $rekamId, $detailId)
    {
        $request->validate([
            'detail' => 'nullable|string|max:255',
        ]);

        DB::table('detail_rekam_medis')
            ->where('iddetail_rekam_medis', $detailId)
            ->where('idrekam_medis', $rekamId)
            ->update([
                'detail' => $this->formatText($request->detail),
            ]);

        return back()->with('ok', 'Catatan tindakan berhasil diperbarui.');
    }

    // Validasi input rekam medis
    private function validateRekamMedis(Request $request)
    {
        $request->validate([
            'idpet' => 'required|integer',
            'anamnesa' => 'required|string|max:255',
            'temuan_klinis' => 'nullable|string|max:255',
            'diagnosa' => 'required|string|max:255',
            // tidak perlu validasi idreservasi_dokter lagi, diisi otomatis
        ], [
            'idpet.required' => 'Pilih hewan terlebih dahulu.',
            'anamnesa.required' => 'Anamnesa wajib diisi.',
            'diagnosa.required' => 'Diagnosa wajib diisi.',
        ]);
    }

    // Simpan rekam medis baru ke database
    private function createRekamMedis(Request $request)
    {
        // dokter yang login (sesuaikan dengan struktur tabel user-mu)
        $dokterId = Auth::user()->idrole_user ?? Auth::id();

        // cari reservasi terbaru di temu_dokter untuk hewan ini & dokter ini
        $reservasi = DB::table('temu_dokter')
            ->where('idpet', $request->idpet)
            ->where('idrole_user', $dokterId)
            ->orderByDesc('waktu_daftar')
            ->first();

        $idreservasi = $reservasi->idreservasi_dokter ?? null;

        DB::table('rekam_medis')->insert([
            'idpet' => $request->idpet,
            'dokter_pemeriksa' => $dokterId,
            'idreservasi_dokter' => $idreservasi, // bisa null kalau tidak ketemu
            'anamnesa' => $this->formatText($request->anamnesa),
            'temuan_klinis' => $this->formatText($request->temuan_klinis),
            'diagnosa' => $this->formatText($request->diagnosa),
            'created_at' => now(),
        ]);
    }

    // Format teks input
    private function formatText($text)
    {
        if (!$text) {
            return null;
        }
        return ucfirst(strtolower(trim($text)));
    }
}

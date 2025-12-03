<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\RekamMedis;
use App\Models\Pet;
use App\Models\User;

class RekamMedisController extends Controller
{
    # Helper untuk redirect dengan pesan
    private function redirectMsg($route, $msg, $type = 'success')
    {
        return redirect()->route($route)->with($type, $msg);
    }

    # Index (aktif & terhapus)
    public function index(Request $request)
    {
        try {
            $showDeleted = $request->has('show_deleted');

            $data = RekamMedis::query()
                ->with(['pet.pemilik.user', 'dokter'])
                ->when($showDeleted, fn ($q) => $q->onlyTrashed())
                ->orderBy('idrekam_medis', 'asc')
                ->get();

            return view('dashboard.admin.rekam-medis.index', compact('data', 'showDeleted'));
        } catch (\Throwable $e) {
            Log::error('Load RekamMedis error: ' . $e->getMessage());
            return back()->with('danger', 'Gagal memuat data rekam medis.');
        }
    }

    # Create
    public function create()
    {
        // List hewan
        $pet = Pet::with('pemilik.user')
            ->orderBy('idpet', 'asc')
            ->get();

        // Dokter: dari role "Dokter" & role aktif
        $dokter = User::whereHas('roles', function ($q) {
                $q->where('nama_role', 'Dokter')
                  ->where('role_user.status', 1);
            })
            ->orderBy('nama')
            ->get();

        // Reservasi dari temu_dokter + join ke pet & dokter
        $reservasiList = DB::table('temu_dokter as t')
            ->join('pet as p', 'p.idpet', '=', 't.idpet')
            ->join('role_user as ru', 'ru.idrole_user', '=', 't.idrole_user')
            ->join('user as u', 'u.iduser', '=', 'ru.iduser')
            ->select(
                't.idreservasi_dokter',
                't.no_urut',
                't.waktu_daftar',
                't.status',
                't.idpet',
                'p.nama as nama_hewan',
                'u.iduser as iddokter',
                'u.nama  as nama_dokter'
            )
            ->whereNull('t.deleted_at')
            // ->where('t.status', 1)
            ->orderBy('t.idreservasi_dokter', 'asc')
            ->get();

        return view('dashboard.admin.rekam-medis.create', compact('pet', 'dokter', 'reservasiList'));
    }

    # Store
    public function store(Request $r)
    {
        $r->validate([
            'idpet'              => 'required|integer|exists:pet,idpet',
            'dokter_pemeriksa'   => 'required|integer|exists:user,iduser',
            'idreservasi_dokter' => 'nullable|integer',
            'diagnosa'           => 'required|string|max:255',
            'anamnesa'           => 'nullable|string',
            'temuan_klinis'      => 'nullable|string',
        ]);

        try {
            RekamMedis::create([
                'idpet'              => $r->idpet,
                'dokter_pemeriksa'   => $r->dokter_pemeriksa,
                'idreservasi_dokter' => $r->idreservasi_dokter ?: null,
                'diagnosa'           => $r->diagnosa,
                'anamnesa'           => $r->anamnesa,
                'temuan_klinis'      => $r->temuan_klinis,
                'created_at'         => now(),
            ]);

            return $this->redirectMsg(
                'admin.rekam-medis.index',
                '✅ Rekam Medis berhasil ditambahkan.'
            );
        } catch (\Throwable $e) {
            Log::error('Insert RekamMedis error: ' . $e->getMessage());
            return back()->withInput()->with('danger', '❌ Gagal menyimpan data.');
        }
    }

    # Edit
    public function edit($id)
    {
        try {
            $item = RekamMedis::findOrFail($id);

            $pet = Pet::with('pemilik.user')
                ->orderBy('idpet', 'asc')
                ->get();

            $dokter = User::whereHas('roles', function ($q) {
                    $q->where('nama_role', 'Dokter')
                      ->where('role_user.status', 1);
                })
                ->orderBy('nama')
                ->get();

            $reservasiList = DB::table('temu_dokter as t')
                ->join('pet as p', 'p.idpet', '=', 't.idpet')
                ->join('role_user as ru', 'ru.idrole_user', '=', 't.idrole_user')
                ->join('user as u', 'u.iduser', '=', 'ru.iduser')
                ->select(
                    't.idreservasi_dokter',
                    't.no_urut',
                    't.waktu_daftar',
                    't.status',
                    't.idpet',
                    'p.nama as nama_hewan',
                    'u.iduser as iddokter',
                    'u.nama  as nama_dokter'
                )
                ->whereNull('t.deleted_at')
                ->orderBy('t.idreservasi_dokter', 'asc')
                ->get();

            return view('dashboard.admin.rekam-medis.edit', compact('item', 'pet', 'dokter', 'reservasiList'));
        } catch (\Throwable $e) {
            Log::error('Edit RekamMedis error: ' . $e->getMessage());
            return $this->redirectMsg('admin.rekam-medis.index', '❌ Data tidak ditemukan.', 'danger');
        }
    }

    # Update
    public function update(Request $r, $id)
    {
        $r->validate([
            'idpet'              => 'required|integer|exists:pet,idpet',
            'dokter_pemeriksa'   => 'required|integer|exists:user,iduser',
            'idreservasi_dokter' => 'nullable|integer',
            'diagnosa'           => 'required|string|max:255',
            'anamnesa'           => 'nullable|string',
            'temuan_klinis'      => 'nullable|string',
        ]);

        try {
            $item = RekamMedis::findOrFail($id);

            $item->update([
                'idpet'              => $r->idpet,
                'dokter_pemeriksa'   => $r->dokter_pemeriksa,
                'idreservasi_dokter' => $r->idreservasi_dokter ?: null,
                'diagnosa'           => $r->diagnosa,
                'anamnesa'           => $r->anamnesa,
                'temuan_klinis'      => $r->temuan_klinis,
            ]);

            return $this->redirectMsg('admin.rekam-medis.index', '✏️ Data Rekam Medis berhasil diperbarui.');
        } catch (\Throwable $e) {
            Log::error('Update RekamMedis error: ' . $e->getMessage());
            return back()->withInput()->with('danger', '❌ Gagal memperbarui data.');
        }
    }

   # Delete
    public function destroy($id)
    {
        try {
            RekamMedis::findOrFail($id)->delete();
            return back()->with('success', '🗑️ Rekam Medis berhasil dihapus (soft delete).');
        } catch (\Throwable $e) {
            Log::error('Delete RekamMedis error: ' . $e->getMessage());
            return back()->with('danger', '❌ Gagal menghapus data.');
        }
    }

    # Restore
    public function restore($id)
    {
        try {
            RekamMedis::withTrashed()->where('idrekam_medis', $id)->restore();
            return $this->redirectMsg('admin.rekam-medis.index', '♻️ Data Rekam Medis berhasil dipulihkan!');
        } catch (\Throwable $e) {
            Log::error('Restore RekamMedis error: ' . $e->getMessage());
            return back()->with('danger', '❌ Gagal memulihkan data.');
        }
    }
}

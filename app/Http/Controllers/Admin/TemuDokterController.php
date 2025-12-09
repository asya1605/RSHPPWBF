<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TemuDokterController extends Controller
{
public function index(Request $request)
{
    $selectedDate = $request->query('date', date('Y-m-d'));
    $showDeleted  = $request->has('show_deleted');

    $query = DB::table('temu_dokter as td')
        ->join('pet as p', 'p.idpet', '=', 'td.idpet')
        ->select('td.*', 'p.nama as nama_pet')
        ->whereDate('td.waktu_daftar', $selectedDate);

    // Filter soft delete
    if ($showDeleted) {
        $query->whereNotNull('td.deleted_at');
    } else {
        $query->whereNull('td.deleted_at');
    }

    $antrian = $query
        ->orderBy('td.no_urut')
        ->get();

    $allPets = DB::table('pet')->select('idpet', 'nama')->get();

    return view('dashboard.admin.temu-dokter.index', compact(
        'selectedDate',
        'antrian',
        'allPets',
        'showDeleted'
    ));
}

    public function store(Request $request)
    {
        $request->validate([
            'idpet' => 'required|integer',
        ]);

        $lastNo = DB::table('temu_dokter')
            ->whereDate('waktu_daftar', now()->toDateString())
            ->max('no_urut') ?? 0;

        $noUrut = $lastNo + 1;

        DB::table('temu_dokter')->insert([
            'no_urut'        => $noUrut,
            'waktu_daftar'   => now(),
            'status'         => 0,          // 0 = menunggu
            'idpet'          => $request->idpet,
            'idrole_user'    => null,       // kalau nanti mau simpan dokter/role bisa diisi
        ]);

        return redirect()
            ->route('admin.temu-dokter.index', ['date' => now()->toDateString()])
            ->with('success', "Pendaftaran berhasil, No. Urut: {$noUrut}");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1,2', // 0 = menunggu, 1 = selesai, 2 = batal
        ]);

        DB::table('temu_dokter')
            ->where('idreservasi_dokter', $id)
            ->update([
                'status' => $request->status,
            ]);

        return back()->with('success', 'Status antrian berhasil diperbarui.');
    }

    public function restore($id)
{
    try {
        DB::table('temu_dokter')
            ->where('idreservasi_dokter', $id)
            ->update([
                'deleted_at' => null,
                'deleted_by' => null,
            ]);

        return back()->with('success', '♻️ Antrian berhasil dipulihkan.');
    } catch (\Throwable $e) {
        return back()->with('danger', '⚠️ Gagal memulihkan antrian.');
    }
}


    public function destroy($id)
    {
        try {
            DB::table('temu_dokter')
                ->where('idreservasi_dokter', $id)
                ->update([
                    'deleted_at' => Carbon::now(),
                    'deleted_by' => Auth::id(),
                ]);

            return back()->with('success', '🗑️ Antrian berhasil dihapus (soft delete).');
        } catch (\Throwable $e) {
            return back()->with('danger', '⚠️ Gagal menghapus antrian.');
        }
    }

}

<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemuDokterController extends Controller
{
    public function index(Request $request)
    {
        $selectedDate = $request->query('date', date('Y-m-d'));

        $antrian = DB::table('temu_dokter as td')
            ->join('pet as p', 'p.idpet', '=', 'td.idpet')
            ->select('td.*', 'p.nama as nama_pet')
            ->whereDate('td.waktu_daftar', $selectedDate)
            ->orderBy('td.no_urut')
            ->get();

        $allPets = DB::table('pet')->select('idpet', 'nama')->get();

        return view('dashboard.resepsionis.temu-dokter.index', compact('selectedDate', 'antrian', 'allPets'));
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
            'no_urut' => $noUrut,
            'waktu_daftar' => now(),
            'status' => 0,
            'idpet' => $request->idpet,
            'idrole_user' => null,
        ]);

        return redirect()->back()->with('success', "Pendaftaran berhasil, No. Urut: {$noUrut}");
    }

    public function update(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:1,2']);
        DB::table('temu_dokter')->where('idreservasi_dokter', $id)->update(['status' => $request->status]);
        return back()->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('temu_dokter')->where('idreservasi_dokter', $id)->delete();
        return back()->with('success', 'Antrian berhasil dihapus.');
    }
}

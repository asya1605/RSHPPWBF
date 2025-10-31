<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    /**
     * Tampilkan semua data jenis hewan
     */
    public function index()
    {
        $list = JenisHewan::orderBy('nama_jenis_hewan')->get();
        return view('dashboard.admin.jenis-hewan.index', compact('list'));
    }

    /**
     * Form tambah jenis hewan
     */
    public function create()
    {
        return view('dashboard.admin.jenis-hewan.create');
    }

    /**
     * Simpan jenis hewan baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100|unique:jenis_hewan,nama_jenis_hewan'
        ]);

        JenisHewan::create([
            'nama_jenis_hewan' => $request->nama_jenis_hewan
        ]);

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', '✅ Jenis hewan berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail 1 jenis hewan (opsional, agar tidak error resource route)
     */
    public function show($id)
    {
        $jenis = JenisHewan::find($id);

        if (!$jenis) {
            return redirect()->route('admin.jenis-hewan.index')
                             ->with('danger', '❌ Jenis hewan tidak ditemukan.');
        }

        // Kalau kamu belum punya halaman show, redirect aja ke index
        return redirect()->route('admin.jenis-hewan.index');
        // Atau nanti bisa dibuat view detail-nya
        // return view('dashboard.admin.jenis-hewan.show', compact('jenis'));
    }

    /**
     * Form edit data jenis hewan
     */
    public function edit($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        return view('dashboard.admin.jenis-hewan.edit', compact('jenis'));
    }

    /**
     * Update data jenis hewan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100|unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan'
        ]);

        JenisHewan::where('idjenis_hewan', $id)->update([
            'nama_jenis_hewan' => $request->nama_jenis_hewan
        ]);

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', '✏️ Jenis hewan berhasil diperbarui.');
    }

    /**
     * Hapus data jenis hewan
     */
    public function destroy($id)
    {
        $used = DB::table('ras_hewan')->where('idjenis_hewan', $id)->exists();

        if ($used) {
            return redirect()->route('admin.jenis-hewan.index')
                             ->with('danger', '⚠️ Tidak dapat dihapus: masih digunakan pada tabel ras.');
        }

        JenisHewan::where('idjenis_hewan', $id)->delete();

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', '🗑️ Jenis hewan berhasil dihapus.');
    }
}

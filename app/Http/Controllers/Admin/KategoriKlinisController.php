<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriKlinisController extends Controller
{
    /**
     * Tampilkan daftar semua kategori klinis
     */
    public function index()
    {
        $kategoriList = DB::table('kategori_klinis')
            ->select('idkategori_klinis', 'nama_kategori_klinis')
            ->orderBy('nama_kategori_klinis')
            ->get();

        return view('dashboard.admin.kategori-klinis.index', compact('kategoriList'));
    }

    /**
     * Form tambah kategori klinis baru
     */
    public function create()
    {
        return view('dashboard.admin.kategori-klinis.create');
    }

    /**
     * Simpan data kategori klinis baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100|unique:kategori_klinis,nama_kategori_klinis',
        ]);

        DB::table('kategori_klinis')->insert([
            'nama_kategori_klinis' => $request->nama_kategori_klinis,
        ]);

        return redirect()
            ->route('admin.kategori-klinis.index')
            ->with('success', '✅ Kategori Klinis berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail kategori klinis tertentu
     */
    public function show($id)
    {
        $kategori = DB::table('kategori_klinis')->where('idkategori_klinis', $id)->first();

        if (!$kategori) {
            return redirect()
                ->route('admin.kategori-klinis.index')
                ->with('danger', '❌ Data kategori klinis tidak ditemukan.');
        }

        return view('dashboard.admin.kategori-klinis.show', compact('kategori'));
    }

    /**
     * Form edit kategori klinis
     */
    public function edit($id)
    {
        $kategori = DB::table('kategori_klinis')->where('idkategori_klinis', $id)->first();

        if (!$kategori) {
            return redirect()
                ->route('admin.kategori-klinis.index')
                ->with('danger', '❌ Data kategori klinis tidak ditemukan.');
        }

        return view('dashboard.admin.kategori-klinis.edit', compact('kategori'));
    }

    /**
     * Update data kategori klinis
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100|unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis',
        ]);

        DB::table('kategori_klinis')
            ->where('idkategori_klinis', $id)
            ->update([
                'nama_kategori_klinis' => $request->nama_kategori_klinis,
            ]);

        return redirect()
            ->route('admin.kategori-klinis.index')
            ->with('success', '✅ Kategori Klinis berhasil diperbarui!');
    }

    /**
     * Hapus data kategori klinis
     */
    public function destroy($id)
    {
        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->delete();

        return redirect()
            ->route('admin.kategori-klinis.index')
            ->with('success', '🗑️ Kategori Klinis berhasil dihapus!');
    }
}

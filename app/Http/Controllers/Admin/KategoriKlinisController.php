<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    # Index (aktif & terhapus) 
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');

        $kategoriList = KategoriKlinis::query()
            ->when($showDeleted, fn($q) => $q->onlyTrashed())
            ->orderBy('nama_kategori_klinis')
            ->get();

        return view('dashboard.admin.kategori-klinis.index', compact('kategoriList', 'showDeleted'));
    }

    # Create 
    public function create()
    {
        return view('dashboard.admin.kategori-klinis.create');
    }

    # Store 
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100|unique:kategori_klinis,nama_kategori_klinis',
        ]);

        KategoriKlinis::create(['nama_kategori_klinis' => $request->nama_kategori_klinis]);

        return redirect()->route('admin.kategori-klinis.index')
            ->with('success', '✅ Kategori Klinis berhasil ditambahkan!');
    }

    # Edit 
    public function edit($id)
    {
        $kategori = KategoriKlinis::find($id);

        if (!$kategori) {
            return redirect()->route('admin.kategori-klinis.index')
                ->with('danger', '❌ Data kategori klinis tidak ditemukan.');
        }

        return view('dashboard.admin.kategori-klinis.edit', compact('kategori'));
    }

    # Update 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100|unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis',
        ]);

        KategoriKlinis::where('idkategori_klinis', $id)->update([
            'nama_kategori_klinis' => $request->nama_kategori_klinis,
        ]);

        return redirect()->route('admin.kategori-klinis.index')
            ->with('success', '✏️ Kategori Klinis berhasil diperbarui!');
    }

    # Soft Delete 
    public function destroy($id)
    {
        KategoriKlinis::findOrFail($id)->delete();

        return redirect()->route('admin.kategori-klinis.index')
            ->with('success', '🗑️ Kategori Klinis berhasil dihapus (soft delete).');
    }

    # Restore 
    public function restore($id)
    {
        KategoriKlinis::withTrashed()->where('idkategori_klinis', $id)->restore();

        return redirect()->route('admin.kategori-klinis.index')
            ->with('success', '♻️ Kategori Klinis berhasil dipulihkan.');
    }
}

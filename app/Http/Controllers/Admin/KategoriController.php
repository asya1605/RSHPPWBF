<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    # Index — tampilkan aktif atau terhapus 
    public function index(Request $request)
    {
        $showDeleted = $request->has('show_deleted');

        $kategoriList = Kategori::query()
            ->when($showDeleted, fn($q) => $q->onlyTrashed())
            ->orderBy('idkategori')
            ->get();

        return view('dashboard.admin.kategori.index', compact('kategoriList', 'showDeleted'));
    }

    # Create 
    public function create()
    {
        return view('dashboard.admin.kategori.create');
    }

    # Store 
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori',
        ]);

        Kategori::create(['nama_kategori' => $request->nama_kategori]);

        return redirect()->route('admin.kategori.index')
            ->with('success', '✅ Kategori berhasil ditambahkan!');
    }

    # Edit 
    public function edit($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return redirect()->route('admin.kategori.index')
                ->with('danger', '❌ Data kategori tidak ditemukan.');
        }

        return view('dashboard.admin.kategori.edit', compact('kategori'));
    }

    # Update 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori,' . $id . ',idkategori',
        ]);

        Kategori::where('idkategori', $id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori.index')
            ->with('success', '✏️ Kategori berhasil diperbarui!');
    }

    # Soft Delete 
    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', '🗑️ Kategori berhasil dihapus (soft delete).');
    }

    # Restore 
    public function restore($id)
    {
        Kategori::withTrashed()->where('idkategori', $id)->restore();

        return redirect()->route('admin.kategori.index')
            ->with('success', '♻️ Kategori berhasil dipulihkan.');
    }
}

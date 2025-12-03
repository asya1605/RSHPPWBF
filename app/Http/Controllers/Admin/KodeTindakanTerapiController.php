<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class KodeTindakanTerapiController extends Controller
{
    private function redirectWithMessage($route, $message, $type = 'success')
    {
        return redirect()->route($route)->with($type, $message);
    }

    # Index 
    public function index(Request $request)
    {
        try {
            $showDeleted = $request->has('show_deleted');

            $query = KodeTindakanTerapi::with([
                'kategori' => fn($q) => $q->withTrashed(),
                'kategoriKlinis' => fn($q) => $q->withTrashed(),
            ]);

            // kalau mau lihat data terhapus
            if ($showDeleted) {
                $query->onlyTrashed();
            }

            // ⬇TAMPILKAN SEMUA (tanpa pagination)
            $data = $query->orderBy('kode')->get();

            return view('dashboard.admin.kode-tindakan-terapi.index', [
                'data'        => $data,
                'showDeleted' => $showDeleted,
            ]);
        } catch (QueryException $e) {
            Log::error("Error fetching kode tindakan terapi: " . $e->getMessage());
            return back()->with('error', '⚠️ Gagal memuat data kode tindakan terapi.');
        }
    }

    # Create
    public function create()
    {
        try {
            $kategori = Kategori::orderBy('nama_kategori')->get();
            $kategori_klinis = KategoriKlinis::orderBy('nama_kategori_klinis')->get();
            return view('dashboard.admin.kode-tindakan-terapi.create', compact('kategori', 'kategori_klinis'));
        } catch (\Exception $e) {
            Log::error("Error loading create form: " . $e->getMessage());
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', '⚠️ Gagal membuka halaman tambah data.', 'error');
        }
    }

   # Store
        public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|exists:kategori_klinis,idkategori_klinis',
        ]);

        try {
            KodeTindakanTerapi::create([
                'kode' => $request->kode,
                'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
                'idkategori' => $request->idkategori,
                'idkategori_klinis' => $request->idkategori_klinis,
            ]);

            return redirect()
                ->route('admin.kode-tindakan-terapi.index')
                ->with('success', '✅ Kode tindakan terapi berhasil ditambahkan.');
        } catch (\Throwable $e) {
            Log::error('Gagal menyimpan kode tindakan terapi: '.$e->getMessage());
            return back()
                ->withInput()
                ->with('error', '❌ Terjadi kesalahan saat menyimpan data.');
        }
    }
    # Edit
    public function edit($id)
    {
        try {
            $item = KodeTindakanTerapi::findOrFail($id);
            $kategori = Kategori::withTrashed()->orderBy('nama_kategori')->get();
            $kategori_klinis = KategoriKlinis::withTrashed()->orderBy('nama_kategori_klinis')->get();

            return view('dashboard.admin.kode-tindakan-terapi.edit', compact('item', 'kategori', 'kategori_klinis'));
        } catch (\Exception $e) {
            Log::error("Error editing kode tindakan terapi ID {$id}: " . $e->getMessage());
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', '❌ Data tidak ditemukan.', 'error');
        }
    }

    # Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode,' . $id . ',idkode_tindakan_terapi',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|integer|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|integer|exists:kategori_klinis,idkategori_klinis',
        ]);

        try {
            $item = KodeTindakanTerapi::findOrFail($id);
            $item->update($request->all());
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', '✏️ Data berhasil diperbarui.');
        } catch (QueryException $e) {
            Log::error("Error updating kode tindakan terapi ID {$id}: " . $e->getMessage());
            return back()->withInput()->with('error', '⚠️ Gagal memperbarui data. Silakan coba lagi.');
        }
    }

    # Soft Delete
    public function destroy($id)
    {
        try {
            KodeTindakanTerapi::findOrFail($id)->delete();
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', '🗑️ Data berhasil dihapus (soft delete).');
        } catch (\Exception $e) {
            Log::error("Error deleting kode tindakan terapi ID {$id}: " . $e->getMessage());
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', '⚠️ Gagal menghapus data.', 'error');
        }
    }

   # Restore
    public function restore($id)
    {
        try {
            KodeTindakanTerapi::withTrashed()->where('idkode_tindakan_terapi', $id)->restore();
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', '♻️ Data berhasil dipulihkan!');
        } catch (\Exception $e) {
            Log::error("Error restoring kode tindakan terapi ID {$id}: " . $e->getMessage());
            return $this->redirectWithMessage('admin.kode-tindakan-terapi.index', '⚠️ Gagal memulihkan data.', 'error');
        }
    }
}
